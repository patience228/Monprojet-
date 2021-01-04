@extends('Utilisateur.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Produits</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
              <li class="breadcrumb-item active">Produits </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="container-fluid">
<h1>La liste des produits en stock</h1>
</div>
<hr>


       <div class="col-sm-12">


      
  </div>
<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                    <th>Identifiant</th>
                  <th>Designation</th>
                  <th>Model</th>
                  <th>Prix</th>
                  <th>Quantité</th>
                  <th>Fournisseur</th>
                  <th>Date d'entree </th>

                  
                  </tr>
                  </thead>
                  <tbody>
                @foreach($Produits as $Produit)
                @if($Produit->Qte_achete <= 0)
										<div class="alert btn-danger" autoWidth=5%>
												<p class="lead text-center"> <b>Rupture de Stock du produit : {{$Produit->design_Prdt}} -{{$Produit->model_Prdt}}</b> </p>
											</div>
									@endif

                <tr class="data-heading">
                    
                    <td>
                        {{$Produit->num_Prdt}}
                    </td>
                    <td>
                        {{$Produit->design_Prdt}}
                    </td>
                    
                    <td>
                        {{$Produit->model_Prdt}}
                    </td>
                    <td>
                        {{$Produit->PV_Prdt}}
                    </td>
                    <td>
                        {{$Produit->Qte_achete}}
                    </td>
                    <td>
                        {{$Produit->nom_Frs}}
                    </td>
                    <td>
                        {{\Carbon\Carbon::parse($Produit->date_Entree)->format('d/m/Y')}}
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

