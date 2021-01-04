@extends('Utilisateur.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Commandes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Commandes </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      <h1>La liste commandes</h1>
    </div>
<hr>

<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                    <th>Code</th>
                    <th>Client</th>
                    <th>Produit</th>
                    <th>Model</th>
                    <th>Prix </th>
                    <th>Quantité commandée</th>
                    <th>Date commande</th>


                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
              
             
        @foreach($cmds as $cmd) 
                 
<tr class="data-heading">
    
   

    <td>
        {{$cmd->code}}
    </td>

    <td>
        {{$cmd->nom_Clt}}
    </td>
    
    <td>
        {{$cmd->design_Prdt}}
    </td>
    <td>
        {{$cmd->model_Prdt}}
    </td>

    <td>
        {{$cmd->PV_Prdt}}
    </td>
    <td>
        {{$cmd->Qte_Cmde}}
    </td>
    <td>
        {{\Carbon\Carbon::parse($cmd->date_Cmde)->format('d/m/Y')}}
    </td>
    
    
    <td>
      <div class="form-group btn-container">
      
     
        <a href="/recu/{{$cmd->code}}"><button type="button" class="btn btn-primary btn-sm" class="inline-block">Facturer</button></a>
      
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
