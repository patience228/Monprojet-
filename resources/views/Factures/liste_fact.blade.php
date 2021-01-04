@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Factures</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Factures </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      <h1>La liste factures</h1>
    </div>
<hr>
<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                  <th>Commande</th>
                  <th>Date facture</th>
                  <th>Etat facture</th>
                  <th>Echeance</th>

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
        {{\Carbon\Carbon::parse($cmd->date_Fact)->format('d/m/Y')}}
    </td>
    
    <td>
    
    @if ($cmd->reste > 0)
       <p>Crédité</p>
    @endif

    @if ($cmd->reste == 0)
       <p>Payé</p>
    @endif
  
    @if ($cmd->MT_Reglem == 0)
       <p>Impayé</p>
    @endif
        
    </td>
    
    <td>
        {{\Carbon\Carbon::parse($cmd->echeance)->format('d/m/Y')}}
    </td>
    
    
    
    <td>
      <div class="form-group btn-container">
            
            <a href="/facture/{{$num_client}}" class="btn btn-success" type="submit">Afficher</a>
            <form  action ="{{route('Factures.destroy',$cmd->num_Fact)}} " method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr?')" >
    
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


