@extends('layouts.default')

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
<div class="container" text-align="center">
    <div class="row">
    <div class="container-fluid">
        <div class="jumbotron">
    <center><h1><u> Modifier une entree en stock </u></h1></center>
    <br>
    
    
    <form  action ="{{route('Livrer2.update',$approvisionnement->num_Entree)}}" method="POST" class="unlock-form">
    
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label class="control-label">Fournisseur</label>
            <select class="custom-select" name="Frs" id="">
              @foreach($Fournisseurs as $Fournisseur)
              <option value="{{ $Fournisseur->num_Frs}}"  {{ $approvisionnement->num_Frs == $Fournisseur->num_Frs ? 'selected' :''}}>
                {{$Fournisseur->nom_Frs}}
              </option>
              @endforeach
            </select>
            <br>
            {!! $errors->first('Frs','<p class="error-msg"> :message</p>')!!}

            <label class="control-label">Produit</label>
            <select class="custom-select" name="Prdt" id="">
              @foreach($Produits as $Produit)
              <option value="{{ $Produit->num_Prdt}}"  {{ $approvisionnement->num_Prdt == $Produit->num_Prdt ? 'selected' :''}}>
                {{$Produit->design_Prdt}}
              </option>
              @endforeach
            </select>
            <br>
            {!! $errors->first('Prdt','<p class="error-msg"> :message</p>')!!}
        
            <label class="control-label">Quantite</label>
            <input class="form-control" type="text" name="Qte" placeholder="Entrer la quantite"} value="{{ old('Qte')?? $approvisionnement->Qte_achete }}">
            {!! $errors->first('Qte','<p class="error-msg"> :message</p>')!!}

            <label class="control-label">Date d'entree</label>
            <input class="form-control" type="date" name="dte" placeholder="Entrer la date"} value="{{ old('dte') ?? $approvisionnement->date_Entree }}">
            {!! $errors->first('dte','<p class="error-msg"> :message</p>')!!}

            

            <br>

            <div class="form-group btn-container">
            <button class="btn btn-primary" type="submit">Valider</button>
            
            </div>
        </div >
        </div>
      
        </form>
      
        </div>
    </div>
</div>
    

@endsection


