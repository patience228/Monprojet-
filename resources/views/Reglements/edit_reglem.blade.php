@extends('layouts.default')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Règlements</h1>
            <br />
            <a  class="btn btn-primary" href="javascript:history.go(-1)">Retour</a>
          
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
    <div class="container-fluid">
      
    </div>


<!-- /.card-header -->

    <div class="container" text-align="center">
    <div class="row">
    <div class="container-fluid">
            <!-- jquery validation -->
            <div class="card card-outline card-info">
              <div class="card-header ">
                <h3 class="card-title">Effectuer un règlement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action ="{{route('Reglements.update',$Reglem->num_Reglem)}}" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
              {{ method_field('PUT') }}
              
                <div class="card-body">
                  <div class="form-group">
                    
                        <br />
                      <input class="form-control" type="hidden" id="" name="code" value="" placeholder="Requis"  /> 
                  </div>
                  <div class="form-group">
                     <label class="control-label">Montant à régler</label>
                      <input class="form-control" type="text" name="mont" placeholder="Entrer le montant" value="{{ old('mont') }}">
                      {!! $errors->first('mont','<p class="error-msg"> :message</p>')!!}
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
