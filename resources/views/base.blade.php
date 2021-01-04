@extends('layouts.admin')
@section('content')
 <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">


<div class="col-lg-3 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="ion ion-bag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Commandes</span>
                <span class="info-box-number">{{$nb_Cmd}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Agents</span>
                <span class="info-box-number">{{$nb_Ag}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         <div class="col-lg-3 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="ion ion-person-add"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Clients</span>
                <span class="info-box-number">{{$nb_Clt}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-lg-3 col-6">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Commandes livrées</span>
                <span class="info-box-number">93,139</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        



         

           <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="card card-secondary">
                  <div class="card-header">
                    <h3 class="card-title">Carte</h3>

                    
                  </div>
                  <div class="card-body">
                      {!! $produit->container() !!}
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                </div>

              <div class="col-md-6">
                <!-- AREA CHART -->
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Carte</h3>

                    
                  </div>
                  <div class="card-body">
                    {!! $carte->container() !!}
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                 </div>

               
                {!! $produit->script() !!}
                {!! $carte->script() !!}
        </div>
        <!-- /.row -->
        <!-- Main row -->
    </section>
   
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
  


@endsection