@extends('layouts.default')
@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Emballages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Emballages </li>
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
                <h3 class="card-title">Modifier un emballage</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action ="{{route('Emballages.update',$Emballage->cod_Emb)}}" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
              {{ method_field('PUT') }}

                <div class="card-body">
                  <div class="form-group">
                    <label class="control-label">Désignation</label>
                    <input class="form-control" type="text" name="design_Emb" placeholder="Entrer la désignation de l'emballage"} value="{{ old('design_Emb')  ?? $Emballage->design_Emb}}">
                    {!! $errors->first('design_Emb','<p class="error-msg"> :message</p>')!!}
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

