@extends('layouts.default')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Agents</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Agents </li>
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
                <h3 class="card-title">Modifier un agent</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
           
        
              <form  action ="{{route('Agents.update',$Agent->num_Ag)}}" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

                <div class="card-body">
                  <div class="form-group">
                     <label class="control-label">Nom</label>
                      <input class="form-control" type="text" name="nom" placeholder="Entrer le nom"} value="{{ old('nom')?? $Agent->nom_Ag }}">
                      {!! $errors->first('nom','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                     <label class="control-label">Fonction</label>
                    <input class="form-control" type="text" name="fonction" placeholder="Entrer la fonction"} value="{{ old('fonction')?? $Agent->fonction }}">
                    {!! $errors->first('fonction','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Adresse</label>
                    <input class="form-control" type="text" name="adresse" placeholder="Entrer l'adresse"} value="{{ old('adresse') ?? $Agent->adr_Ag }}">
                    {!! $errors->first('adresse','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Télephone</label>
                    <input class="form-control" type="text" name="tel" placeholder="Entrer le numéro de télephone"} value="{{ old('tel') ?? $Agent->tel_Ag  }}">
                    {!! $errors->first('tel','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Entrer l'email"} value="{{ old('email') ?? $Agent->email }}">
                    {!! $errors->first('email','<p class="error-msg"> :message</p>')!!}
                  </div>
                 
                  
                 
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

    

@endsection


