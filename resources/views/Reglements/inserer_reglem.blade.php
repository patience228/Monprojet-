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
    <center><h1><u> Enregistrer un règlement </u></h1></center>
    <br>
    
    
    <form  action ="/inserer_reglem" method="POST" class="unlock-form">
    
        {{ csrf_field() }}
        
        <div class="form-group">
            
             <label class="control-label">Type de  règlement</label>
             <select class="custom-select" name="reglem" id="">
             <option value=" cheque"> cheque </option>
             <option value=" virement">virement bancaire </option>
              <option value=" carte"> carte bancaire</option>
              
            </select>
            <br>
            {!! $errors->first('reglem','<p class="error-msg"> :message</p>')!!}

           
            <label class="control-label">Date du règlement</label>
            <input class="form-control" type="date" name="dte" placeholder="Entrer la date"} value="{{ old('dte') }}">
            {!! $errors->first('dte','<p class="error-msg"> :message</p>')!!}

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


