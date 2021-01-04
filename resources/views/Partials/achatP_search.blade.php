@extends('layouts.admin')

@section('content')


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Produits</h1>
             <br />
            <a  class="btn btn-primary" href="javascript:history.go(-1)">Retour</a>
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
                <h3 class="card-title"> Recherche</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action =" {{route('achatP')}}" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label class="control-label">Entrer le nom du produit</label>
                    <input class="form-control" type="text" name="nom" placeholder="Entrer le nom" value="{{ old('nom') }}">
                    {!! $errors->first('nom','<p class="error-msg"> :message</p>')!!}

                  </div>
                  
                 
                  
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button  class="btn btn-primary" type="submit">Rechercher</button>
                  
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


