@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Commandes</h1>
              <br />
            <a  class="btn btn-primary" href="javascript:history.go(-1)">Retour</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Commandes </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      <h1>Les commandes par client</h1>
    </div>
<hr>

<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   
                    <th>Client</th>
                    
                    <th>Quantité </th>
                    <th>Date </th>
                    

                  </tr>
                  </thead>
                  <tbody>
                  @foreach($cmds as $cmd)
                    <tr class="data-heading">
                        
                        
                        
                        <td>
                            {{$cmd->nom_Clt}}
                        </td>
                    
                        <td>
                            {{$cmd->Qte_Cmde}}
                        </td>
                                     <td>
                                        {{\Carbon\Carbon::parse($cmd->date_Cmde)->format('d/m/Y')}}
                                    </td>
                    
                        
                        
                    
                    
                    </tr>
                    @endforeach
           </tbody>
          <tfoot>
                    
        </tfoot>
     </table>

     
  
            
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
