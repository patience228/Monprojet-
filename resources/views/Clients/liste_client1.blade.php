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
      <h1>La liste des clients</h1>
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


                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
         @foreach($Clients as $Client)
<tr class="data-heading">
    
    <td>
        {{$Client->num_Clt}}
    </td>
    <td>
        {{$Client->nom_Clt}}
    </td>
    
    <td>
        {{$Client->adr_Clt}}
    </td>
    <td>
        {{$Client->tel_Clt}}
    </td>
    <td>
        {{$Client->BP_Clt}}
    </td>
    
    
    <td>
      <div class="form-group ">
            
            <a href="{{Route('Clients.edit',$Client->num_Clt)}}" class="btn btn-success" type="submit">Modifier</a>
            <form  action ="{{Route('Clients.destroy',$Client->num_Clt)}}" method="POST" class="inline-block"  onsubmit="return confirm('Êtes-vous sûr?')" >
    
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
                    <div class="container-fluid">
<div class="col-sm-12">

<ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item active"><a href="{{Route('lister_Clt')}}" class="btn btn-info" type="submit" >Categorie</a></li>
    </ol>
      
  </div><!-- /.col -->
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



 