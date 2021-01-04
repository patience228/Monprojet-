@extends('layouts.admin')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Règlements</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Règlements </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="container" text-align="center">
    <div class="row">
    <div class="container-fluid">
        <div class="jumbotron">
    <center><h1><u> Règlements </u></h1></center>
    <br>
    
    
    <form  action ="/inserer_entrainer" method="POST" class="unlock-form">
    
        {{ csrf_field() }}
        
        <div class="form-group">
            <label class="control-label">Numero facture</label>
            <select class="custom-select" name="fact" id="">
              @foreach($Factures as $Facture)
              <option value="{{ $Facture->num_Fact}}"  {{ $Entrainer->num_Fact == $Facture->num_Fact ? 'selected' :''}}>
                {{$Facture->num_Fact}}
              </option>
              @endforeach
            </select>
            <br>
            {!! $errors->first('fact','<p class="error-msg"> :message</p>')!!}

            
           
            <label class="control-label">Montant</label>
            <input class="form-control" type="text" name="mont" placeholder="Entrer le montant"} value="{{ old('mont') }}">
            {!! $errors->first('mont','<p class="error-msg"> :message</p>')!!}

            <br>
            <label class="control-label">Remise</label>
            <input class="form-control" type="text" name="remise" placeholder="Entrer la remise"} value="{{ old('remise') }}">
            {!! $errors->first('remise','<p class="error-msg"> :message</p>')!!}

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


