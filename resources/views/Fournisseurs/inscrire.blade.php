@extends('layouts.admin')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Fournisseurs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Fournisseurs </li>
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
                <h3 class="card-title"> Enregistrer un nouveau fournisseur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action ="/inscrire" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label class="control-label">Nom</label>
                    <input class="form-control" type="text" name="nom" placeholder="Entrer le nom"} value="{{ old('nom') }}">
                    {!! $errors->first('nom','<p class="error-msg"> :message</p>')!!}

                  </div>
                  <div class="form-group">
                    <label class="control-label">Adresse</label>
                    <input class="form-control" type="text" name="adresse" placeholder="Entrer l'adresse"} value="{{ old('adresse') }}">
                    {!! $errors->first('adresse','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                     <label class="control-label">BP</label>
                    <input class="form-control" type="text" name="BP" placeholder="Entrer le BP"} value="{{ old('BP') }}">
                    {!! $errors->first('BP','<p class="error-msg"> :message</p>')!!}

                  </div>
                  <div class="form-group">
                     <label class="control-label">Télephone</label>
                    <input class="form-control" type="text" name="tel" placeholder="Entrer le numéro de télephone"} value="{{ old('tel') }}">
                    {!! $errors->first('tel','<p class="error-msg"> :message</p>')!!}
                  </div>
                 
                  
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Enregistrer</button>
                  <button class="btn btn-primary" type="reset">Annuler</button>
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

    

@endsection


