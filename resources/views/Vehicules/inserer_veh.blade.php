@extends('layouts.admin')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Vehicules</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Vehicules </li>
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
                <h3 class="card-title">Enregistrer un nouveau vehicule </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action ="/inserer_Veh" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                     <label class="control-label">Matricule</label>
                    <input class="form-control" type="text" name="num" placeholder="Entrer le numero" value="{{ old('num') }}">
                    {!! $errors->first('num','<p class="error-msg"> :message</p>')!!}

            
                  </div>
                  <div class="form-group">
                    <label class="control-label">Marque</label>
                    <input class="form-control" type="text" name="marque" placeholder="Entrer la marque" value="{{ old('marque') }}">
                    {!! $errors->first('marque','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                   <label class="control-label">Categorie</label>
                    <input class="form-control" type="text" name="categ" placeholder="Entrer la categorie" value="{{ old('categ') }}">
                    {!! $errors->first('categ','<p class="error-msg"> :message</p>')!!}
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

    

@stop

