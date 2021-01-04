@extends('layouts.default')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Produits</h1>
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


         <div class="container" text-align="center">
    <div class="row">
    <div class="container-fluid">
            <!-- jquery validation -->
            <div class="card card-outline card-info">
              <div class="card-header ">
                <h3 class="card-title">Modifier un entrée en stock </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action ="{{route('Produits.update',$Produit->num_Prdt)}}" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              
                <div class="card-body">
                  <div class="form-group">
                     <label class="control-label">Fournisseur</label>
                      <select class="custom-select" name="Frs" id="">
                        @foreach($Fournisseurs as $Fournisseur)
                        <option value="{{ $Fournisseur->num_Frs}}"  {{ $Produit->num_Frs == $Fournisseur->num_Frs ? 'selected' :''}}>
                          {{$Fournisseur->nom_Frs}}
                        </option>
                        @endforeach
                      </select>
                      
                      {!! $errors->first('Frs','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Produit</label>
                    <input class="form-control" type="text" name="design" placeholder="Entrer la désignation" value="{{ old('design') ?? $Produit->design_Prdt}}">
                    {!! $errors->first('design','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Modèle</label>
                    <input class="form-control" type="text" name="model" placeholder="Entrer la désignation" value="{{ old('model') ?? $Produit->model_Prdt}}">
                    {!! $errors->first('model','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Prix par casier</label>
                    <input class="form-control" type="text" name="prix" placeholder="Entrer le prix"} value="{{ old('prix') ?? $Produit->PV_Prdt}}">
                     {!! $errors->first('prix','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                     <label class="control-label">Quantite casier</label>
                    <input class="form-control" type="text" name="Qte" placeholder="Entrer la quantite"} value="{{ old('Qte') ?? $Produit->Qte_achete}}">
                    {!! $errors->first('Qte','<p class="error-msg"> :message</p>')!!}
                  </div>
                  
                 
                <!-- /.card-body -->
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Valider</button>
                  
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

    

@stop

