@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fournisseurs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Fournisseurs </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      <h1>La liste des fournisseurs </h1>
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
                  <th>BP</th>
                  <th>Telephone</th>

                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
          @foreach($Fournisseurs as $Fournisseur)
<tr class="data-heading">
    
    <td>
        {{$Fournisseur->num_Frs}}
    </td>
    <td>
        {{$Fournisseur->nom_Frs}}
    </td>
    
    <td>
        {{$Fournisseur->adr_Frs}}
    </td>
    <td>
        {{$Fournisseur->BP_Frs}}
    </td>
    <td>
        {{$Fournisseur->tel_Frs}}
    </td>
    

    <td>
      <div class="form-group btn-container">
            
            <a  href="{{route('Fournisseurs.edit',$Fournisseur->num_Frs)}}" class="btn btn-success" type="submit">Modifier</a>
            <form  action ="{{route('Fournisseurs.destroy',$Fournisseur->num_Frs)}} " method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr?')" >
    
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

