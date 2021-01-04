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
    <center><h1><u> Produit et quantite </u></h1></center>
    <br>
    
    
    <form  action ="/inserer_porter" method="POST" class="unlock-form">
    
        {{ csrf_field() }}
        
        <div class="form-group">
         
            <label class="control-label">Produit</label>
            <select class="custom-select" name="Prdt" id="">
              @foreach($Produits as $Produit)
              <option value="{{ $Produit->num_Prdt}}"  {{ $Porter->num_Prdt == $Produit->num_Prdt ? 'selected' :''}}>
                {{$Produit->design_Prdt}}
              </option>
              @endforeach
            </select>
            <br>
            {!! $errors->first('Prdt','<p class="error-msg"> :message</p>')!!}
        
            <label class="control-label">Quantite</label>
            <input class="form-control" type="text" name="Qte" placeholder="Entrer la quantite"} value="{{ old('Qte') }}">
            {!! $errors->first('Qte','<p class="error-msg"> :message</p>')!!}

            
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


