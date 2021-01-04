@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sortie</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Sortie </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      <h1>La liste des Sorties</h1>
    </div>
<hr>

<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>Produit</th>
                    <th>Model</th>
                
                    <th>Quantité </th>
                    <th>Date </th>


                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cmds as $cmd)
<tr class="data-heading">
    
    
    
    <td>
        {{$cmd->design_Prdt}}
    </td>
    

    <td>
        {{$cmd->model_Prdt}}
    </td>
    <td>
        {{$cmd->Qte_Cmde}}
    </td>
    <td>
        {{\Carbon\Carbon::parse($cmd->date_Cmde)->format('d/m/Y')}}
    </td>
    
    
    <td>
      <div class="form-group btn-container">

     
            
 
            <form  action ="{{route('Commandes.destroy',$cmd->num_Cmde)}} " method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr?')" >
    
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button  class="btn btn-danger btn-sm" type="submit" >Supprimer</button>
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