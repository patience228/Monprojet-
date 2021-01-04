@extends('Utilisateur.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Règlements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Règlements </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      <h1>La liste règlements</h1>
    </div>
<hr>
<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>Facture</th>
                  <th>Type règlement</th>
                  <th>Date règlement</th>
                  <th>Montant règlement</th>
                   <th>Reste à payer</th>
                  




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
                          {{$cmd->type_Reglem}}
                      </td>

                      <td>
                          {{\Carbon\Carbon::parse($cmd->date_Reglem)->format('d/m/Y')}}
                      </td>
                      
                      <td>
                          {{$cmd->MT_Reglem}} FCFA
                      </td>
                      <td>
                           {{$cmd->reste }} FCFA
                      </td>
                      
                    
                      
                      <td>
                        <div class="form-group btn-container">
               @if($cmd->reste > 0)               
            <a href="{{route('Reglements.edit',$cmd->num_Reglem)}}" class="btn btn-success" type="submit">Régler</a>
            @endif
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

