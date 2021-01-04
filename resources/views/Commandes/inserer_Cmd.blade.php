@extends('layouts.admin')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Commandes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Commandes </li>
            </ol>
          </div><!-- /.col -->
              <div class="col-sm-12">
             <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item " ><a href="/panier/{{$num_client}}">   <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
</svg> Panier {{Cart::count()}} </a></li>
               
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


        <div class="container" text-align="center">
    <div class="row">
    <div class="container-fluid">
            <!-- jquery validation -->
            <div class="card card-outline card-info">
              <div class="card-header ">
                <h1 class="card-title" align="center"> Prendre la commandeN<sup>{{$num_client}}</sup></h1>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="tale-responsive">
              <form class="unlock-form" id="form" Action="{{ route('cart.store') }}" method="POST">
              {{ csrf_field() }}
        
                <div class="card-body">
                  <div class="form-group">
                     <input class="form-control" type="hidden" id="" name="code" value="{{$num_client}}" placeholder="Requis"  />
            <label class="control-label">Client</label>
            <select class="custom-select" name="clt" id="">
              @foreach($Clients as $Client)
              <option value="{{ $Client->num_Clt}}"  {{ $Commande->num_Clt == $Client->num_Clt ? 'selected' :''}}>
                {{$Client->nom_Clt}}
              </option>
              @endforeach
            </select>
            <br>
            {!! $errors->first('clt','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <span id="result"></span>
        <table class="table table-bordered table-striped" id="dynamiq">
          <thead>
            <tr>
              <th width="35%">Produit</th>
              <th width="35%">Quantité</th>
              <th width="35%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr> 
             <td>
              <select class="custom-select" name="Prdt[]" id="">
              
               @foreach($Produits as $Produit)
                <option name="Prdt[]" value="{{ $Produit->num_Prdt}}" }}> {{$Produit->design_Prdt}} {{$Produit->model_Prdt}} - {{$Produit->PV_Prdt}}FCFA -Disponible {{$Produit->Qte_achete}}
                </option>
               @endforeach
              </select>
              
              {!! $errors->first('Prdt[]','<p class="error-msg"> :message</p>')!!}
            </td>
           
            <td>
              <input class="form-control" type="text" name="Qte[]" placeholder="Entrer la quantite" value="{{old('Qte')}} ">
              {!! $errors->first('Qte[]','<p class="error-msg"> :message</p>')!!}
            </td>

           
            <td width="35%" style="text-align: center">
              <button type="button"  id="add" class="btn btn-info addRow">Ajouter un produit
            </button></td>

          
          </tr>   
            
          </tbody >
          
        </table> 
     </div>
    
                  
                 
   </div>
                <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit"  id="" class="btn btn-primary">Ajouter au panier</button>
                  
    </div>
   </form>
      </div>
       <!-- /.card -->
     </div>
     </div>
       <!--/.col (left) -->
       <!-- right column -->
     <div class="col-md-6">

     </div>
          <!--/.col (right) -->
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->


<script type="text/javascript">
  $(document).ready(function()
  {
      

    var i = 1;
    
      $('#add').click(function(){
        i++;
        $('#dynamiq').append('<tr id="row'+i+'"><td><select class="custom-select" name="Prdt[]" id="">@foreach($Produits as $Produit)<option name="Prdt[]" value="{{ $Produit->num_Prdt}}" }}> {{$Produit->design_Prdt}} {{$Produit->model_Prdt}} - {{$Produit->PV_Prdt}}FCFA -Disponible {{$Produit->Qte_achete}}</option>@endforeach</select></td><td><input class="form-control" type="text" name="Qte[]" placeholder="Entrer la quantite" value=""></td><td width="35%" style="text-align: center"><button type="button" id="'+i+'" name="remove" class="btn btn-danger icon glyphicon glyphicon-minus pull-right">Retirer le produit</button></td></tr>');
      });

    $(document).on('click','.btn-danger', function(){
      var button_id = $(this).attr("id");
      $("#row"+button_id+"").remove();
    });

$('#submit').click(function()
    {
      $.ajax({
        //url:'{{ route('cart.store') }}',
        //method: "POST",
        data:$('#form').serialize(),
        success: function(data)
        {
          $('#ok').html('<div class="alert alert-dismissible alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+'Enregistrement effectué avec succès'+'</div>');
          $('#form')[0].reset();
        }
        });
    });

  });
  
</script>
    

@endsection


