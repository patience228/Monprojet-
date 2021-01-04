@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Clients</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Clients </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      <h1>La liste des clients </h1>
    </div>
<hr>
<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                  <th>Identifiant</th>
                  <th>Nom</th>
                  <th>Adresse</th>
                  <th>Telephone</th>
                  <th>BP</th>
                  <th>Categorie</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
         @foreach($cats as $cat)
        <tr class="data-heading">
            
            <td>
                {{$cat->num_Clt}}
            </td>
            <td>
                {{$cat->nom_Clt}}
            </td>
            
            <td>
                {{$cat->adr_Clt}}
            </td>
            <td>
                {{$cat->tel_Clt}}
            </td>
            <td>
                {{$cat->BP_Clt}}
            </td>
            <td>
                {{$cat->design_Categ}}
            </td>
            <td>
             <div class="form-group ">
            
            <a href="{{Route('Clients.edit',$cat->num_Clt)}}" class="btn btn-success" type="submit">Modifier</a>
            <form  action ="{{Route('Clients.destroy',$cat->num_Clt)}}" method="POST" class="inline-block"  onsubmit="return confirm('Êtes-vous sûr?')" >
    
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button  class="btn btn-danger" type="submit" >Supprimer</button>
            </form>
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
