@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Règlements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
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
                          {{$cmd->reste}} FCFA
                      </td>
                      
                    
                      
                      <td>
                        <div class="form-group btn-container">
                              
            <!--a href="" class="btn btn-success" type="submit">Régler</a-->
            <form  action ="{{route('Reglements.destroy',$cmd->num_Reglem)}} " method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr?')" >
    
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

   
  <div class="container-fluid">
        <a type="submit" href="{{route('credit')}}" class="btn btn-success">Liste des impayés </a>
        <button  type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-success">Total des crédits</button>
       
        
       </div>

    
     <div class="modal fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content bg-success">
            <div class="modal-header">
              <h4 class="modal-title">Crédits</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>Le total des crédits est:
                  @php

                    $cmds = \Illuminate\Support\Facades\DB::table('entrainers')
                    ->join('factures','entrainers.num_Fact','=','factures.num_Fact')
                    ->distinct()
                    ->join('reglements','entrainers.num_Reglem','=','reglements.num_Reglem')
                    ->distinct()
                    ->join('commandes','commandes.num_Cmde','=','factures.num_Cmde')
                    ->distinct()
                    ->select('factures.*','reglements.*','entrainers.*')
                    //->where('factures.code','=',$num_client)
                    ->orderBy('factures.num_Fact','desc')
                    ->get();
                  
                    $credit=0;
                    foreach ($cmds as  $value) {
                      # code...
                      
                      $credit+=$value->reste;
                    }
                    echo $credit;
                  
                  @endphp FCFA &hellip;
                </p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Fermer</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


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

