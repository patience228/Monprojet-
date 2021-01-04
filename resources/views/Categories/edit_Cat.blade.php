@extends('layouts.default')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Categories </li>
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
                <h3 class="card-title"> Modifier les categories de clients </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action ="{{route('Categories.update',$Categorie->cod_Categ)}}" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

                <div class="card-body">
                  <div class="form-group">
                    <label class="control-label">Désignation</label>
                    <input class="form-control" type="text" name="design_Cat" placeholder="Entrer la désignation categorie"} value="{{ old('design_Cat') ?? $Categorie->design_Categ  }}">
                    {!! $errors->first('design_Cat','<p class="error-msg"> :message</p>')!!}
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

    

@stop

