

@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Approvisionnements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Approvisionnements </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      <h1>La liste des entrées en stock</h1>
 
    </div>

  
<hr>

       <div class="col-sm-12">
<ol class=" float-sm-right">
        <li class="breadcrumb-item active"><a href="{{Route('index_Livr2')}}" class="btn btn-info" type="submit" >Enregistrer les entrées en stock</a></li>
    </ol>

      
  </div>
<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                  <th>Produit</th>
                  
                  <th>Fournisseur</th>
                  <th>Quantité</th>
                  <th>Date d'entrée</th>


                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($approvisionnements as $approvisionnement)
                <tr class="data-heading">
                    
                    <td>
                        {{$approvisionnement->design_Prdt}}
                    </td>
                    
                    <td>
                        {{$approvisionnement->nom_Frs}}
                    </td>
                    
                    <td>
                        {{$approvisionnement->Qte_achete}}
                    </td>
                    <td>
                        {{$approvisionnement->date_Entree}}
                    </td>
                    
                    <td>
                      <div class="form-group btn-container">
                            
                            <a href="{{route('Livrer2.edit',$approvisionnement->num_Entree)}}" class="btn btn-success" type="submit">Modifier</a>
                            <form  action ="{{route('Livrer2.destroy',$approvisionnement->num_Entree)}} " method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr?')" >
                    
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


