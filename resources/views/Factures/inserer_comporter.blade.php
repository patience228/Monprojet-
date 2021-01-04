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
<div class="container" text-align="center">
    <div class="row">
    <div class="container-fluid">
        <div class="jumbotron">
    <center><h1><u> Facturation </u></h1></center>
    <br>
    
    
    <form  action ="/inserer_comporter" method="POST" class="unlock-form">
    
        {{ csrf_field() }}
        
        <div class="form-group">
         
            <label class="control-label">Produit commandé</label>
            <select class="custom-select" name="Prdt" id="">
              @foreach($Produits as $Produit)
              <option value="{{ $Produit->num_Prdt}}"  {{ $Comporter->num_Prdt == $Produit->num_Prdt ? 'selected' :''}}>
                {{$Produit->design_Prdt .' ' . $Produit->Qte_Cmde }}
              </option>
              @endforeach
            </select>
            <br>
            {!! $errors->first('Prdt','<p class="error-msg"> :message</p>')!!}
        
            <label class="control-label">Quantite facturée</label>
            <input class="form-control" type="text" name="Qte" placeholder="Entrer la quantite"} value="{{ old('Qte') }}">
            {!! $errors->first('Qte','<p class="error-msg"> :message</p>')!!}

            
            <br>

            <label class="control-label">Quantite bouteille</label>
            <input class="form-control" type="text" name="bte" placeholder="Entrer la quantite"} value="{{ old('bte') }}">
            {!! $errors->first('bte','<p class="error-msg"> :message</p>')!!}

            
            <br>

            <div class="form-group btn-container">
            <button class="btn btn-primary" type="submit">Enregistrer</button>
            <button class="btn btn-primary" type="reset">Annuler</button>
            </div>
        </div >
        </div>
      
        </form>
      
        </div>
    </div>
</div>
    

@endsection


