@extends('layouts.admin')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Produits</h1>
             <br />
            <a  class="btn btn-primary" href="javascript:history.go(-1)">Retour</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Produits </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="container-fluid">
<h1>La liste des achats par model</h1>
</div>
<hr>


  
<!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  
                   
                  <th>Model</th>
                  
                  <th>Quantité</th>
                  <th>Date</th>

                 

                 
                  </tr>
                  </thead>
                  <tbody>
                @foreach($Produits as $Produit)
                

                <tr class="data-heading">
                    
                    
                    
                    <td>
                        {{$Produit->model_Prdt}}
                    </td>
                   
                    <td>
                        {{$Produit->Qte_achete}}
                    </td>
                    <td>
                      {{\Carbon\Carbon::parse($Produit->date_entree)->format('d/m/Y')}}
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

