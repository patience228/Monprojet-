@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Categories </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">  
      <h1>La liste des categories de client</h1>
    </div>
<hr>

<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                  <th>Identifiant</th>
                  <th>Designation</th>

                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
           @foreach($Categories as $Categorie)
        <tr class="data-heading">
            
            <td>
                {{$Categorie->cod_Categ}}
            </td>
            <td>
                {{$Categorie->design_Categ}}
            </td>
  

        <td>
          <div class="form-group btn-container">
                
            <a href="{{route('Categories.edit',$Categorie->cod_Categ)}}" class="btn btn-success" type="submit">Modifier</a>
            <form  action ="{{route('Categories.destroy',$Categorie->cod_Categ)}} " method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr?')" >
    
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button  class="btn btn-danger" type="submit" >Supprimer</button>
            </form>
       </div>
       </div>
    </td>
  
  </tr>
  @endforeach
           </tbody>
          <tfoot>
                    
        </tfoot>
     </table>
  </div>
  
  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> 
@endsection
