@extends('layouts.default')

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
                <h3 class="card-title">Modifier un fournisseur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action ="{{route('Fournisseurs.update',$Fournisseur->num_Frs)}}" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

                <div class="card-body">
                  <div class="form-group">
                    <label class="control-label">Nom</label>
                    <input class="form-control" type="text" name="nom" placeholder="Entrer le nom"} value="{{ old('nom')  ?? $Fournisseur->nom_Frs}}">
                    {!! $errors->first('nom','<p class="error-msg"> :message</p>')!!}

                  </div>
                  <div class="form-group">
                    <label class="control-label">Adresse</label>
                    <input class="form-control" type="text" name="adresse" placeholder="Entrer l'adresse"} value="{{ old('adresse')  ?? $Fournisseur->adr_Frs}}">
                    {!! $errors->first('adresse','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                     <label class="control-label">BP</label>
                    <input class="form-control" type="text" name="BP" placeholder="Entrer le BP"} value="{{ old('BP')  ?? $Fournisseur->BP_Frs}}">
                    {!! $errors->first('BP','<p class="error-msg"> :message</p>')!!}

                  </div>
                  <div class="form-group">
                     <label class="control-label">Télephone</label>
                    <input class="form-control" type="text" name="tel" placeholder="Entrer le numéro de télephone"} value="{{ old('tel')  ?? $Fournisseur->tel_Frs}}">
                    {!! $errors->first('tel','<p class="error-msg"> :message</p>')!!}
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


