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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="container" text-align="center">
    <div class="row">
    <div class="container-fluid">
        <div class="jumbotron">
    <center><h3>Mettre à jour la commande</h3></center>
    <br>
    
    <div class="tale-responsive">
      <form  method="POST" class="unlock-form" id="form">
              {{ csrf_field() }}
        
        <div class="form-group">
         <input class="form-control" type="hidden" id="" name="code" value="{{$commandes->code}}" placeholder="Requis"  />
            <label class="control-label">Client</label>
            <select class="custom-select" name="clt" id="">
              @foreach($Clients as $Client)
              <option value="{{ $Client->num_Clt}}"  {{ $commandes->num_Clt == $Client->num_Clt ? 'selected' :''}}>
                {{$Client->nom_Clt}}
              </option>
              @endforeach
            </select>
            <br>
            {!! $errors->first('clt','<p class="error-msg"> :message</p>')!!}
      
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
            </td>
           
            <td>
              <input class="form-control" type="text" name="Qte[]" placeholder="Entrer la quantite" value="{{old('Qte')}} ">
              
            </td>

           
            <td width="35%" style="text-align: center">
              <button type="button"  id="add" class="btn btn-info addRow">+
            </button></td>

          
          </tr>   
            
          </tbody >
          
        </table> 
         <button type="submit"  id="submit" class="btn btn-primary">Valider
            </button>
    </form>
      
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function()
  {
      <?php
      $Produits = Illuminate\Support\Facades\DB::table('produits')->get();
      
      ?>

    var i = 1;
    
      $('#add').click(function(){
        i++;
        $('#dynamiq').append('<tr id="row'+i+'"><td><select class="custom-select" name="Prdt[]" id="">@foreach($Produits as $Produit)<option name="Prdt[]" value="{{ $Produit->num_Prdt}}" }}> {{$Produit->design_Prdt}} {{$Produit->model_Prdt}} - {{$Produit->PV_Prdt}}FCFA -Disponible {{$Produit->Qte_achete}}</option>@endforeach</select></td><td><input class="form-control" type="text" name="Qte[]" placeholder="Entrer la quantite" value=""></td><td width="35%" style="text-align: center"><button type="button" id="'+i+'" name="remove" class="btn btn-danger icon glyphicon glyphicon-minus pull-right">-</button></td></tr>');
      });

    $(document).on('click','.btn-danger', function(){
      var button_id = $(this).attr("id");
      $("#row"+button_id+"").remove();
    });

$('#submit').click(function()
    {
      $.ajax({
        url:'{{ route("enregistrer_Cmd") }}',
        method: "POST",
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


