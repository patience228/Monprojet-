@extends('layouts.default')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Clients</h1><br />
            <a  class="btn btn-primary" href="javascript:history.go(-1)">Retour</a>
          
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Clients </li>
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
                <h3 class="card-title">Modifier un client </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
         
              <form  action ="{{ route('Clients.update',$Client->num_Clt) }}" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

                <div class="card-body">
                  <div class="form-group">
                    <label class="control-label">Nom</label>
                    <input class="form-control" type="text" name="nom" placeholder="Entrer le nom"} value="{{ old('nom')  ?? $Client->nom_Clt }}">
                    {!! $errors->first('nom','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Adresse</label>
                    <input class="form-control" type="text" name="adresse" placeholder="Entrer l'adresse"} value="{{ old('adresse')  ?? $Client->adr_Clt }}">
                    {!! $errors->first('adresse','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Télephone</label>
                    <input class="form-control" type="text" name="tel" placeholder="Entrer le numéro de télephone"} value="{{ old('tel')   ?? $Client->tel_Clt}}">
                    {!! $errors->first('tel','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">BP</label>
                    <input class="form-control" type="text" name="BP" placeholder="Entrer le BP" value="{{ old('BP')  ?? $Client->BP_Clt}}">
                    {!! $errors->first('BP','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Categorie</label>
                    <select class="custom-select" name="categorie" id="">
                      @foreach($Categories as $Categorie)
                      <option value="{{ $Categorie->cod_Categ}}"  {{ $Client->cod_Categ == $Categorie->cod_Categ ? 'selected' :''}}>
                        {{$Categorie->design_Categ}}
                      </option>
                      @endforeach
                    </select>
                    <br>
                    {!! $errors->first('categorie','<p class="error-msg"> :message</p>')!!}
                  </div>
             
                  
                  
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">valider</button>
                 
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


