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
    <center><h1><u> Enregistrer une facture </u></h1></center>
    <br>
    
    
    <form  action ="/inserer_fact" method="POST" class="unlock-form">
    
        {{ csrf_field() }}
        
        <div class="form-group">
            <label class="control-label">Numero commande</label>
            <select class="custom-select" name="cmd" id="">
              @foreach($Commandes as $Commande)
              <option value="{{ $Commande->num_Cmde}}"  {{ $Facture->num_Cmde == $Commande->num_Cmde ? 'selected' :''}}>
                {{$Commande->num_Cmde}}
              </option>
              @endforeach
            </select>
            <br>
            {!! $errors->first('cmd','<p class="error-msg"> :message</p>')!!}

             <label class="control-label">Type de  facture</label>
            <select class="custom-select" name="fact" id="">
             <option value=" generique"> facture generique</option>
              <option value=" commerciale">facture commerciale </option>
              <option value=" en attente"> facture en attente</option>
               <option value=" pro-forma"> facture pro-forma</option>
            </select>
            <br>
            {!! $errors->first('fact','<p class="error-msg"> :message</p>')!!}

           
            <label class="control-label">Date de facture</label>
            <input class="form-control" type="date" name="dte" placeholder="Entrer la date"} value="{{ old('dte') }}">
            {!! $errors->first('dte','<p class="error-msg"> :message</p>')!!}

            <br>
            <label class="control-label">Echeance</label>
            <input class="form-control" type="date" name="echeance" placeholder="Entrer l'echeance"} value="{{ old('echeance') }}">
            {!! $errors->first('echeance','<p class="error-msg"> :message</p>')!!}

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


