@extends('Utilisateur.default')

@section('content')

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Commandes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/base')}}">Home</a></li>
              <li class="breadcrumb-item active">Commandes </li>
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
                <h3 class="card-title">Facturer commande</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form  action ="{{route('enregistrer_fact')}}" method="POST" role="form" id="quickForm">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <table  class="table data-table table-bordered table-striped">
                                    <thead>
                                    <tr >
                                  <th>Client</th>
                                      <th>Produit</th>
                                      <th>Model</th>
                                      <th>Prix unitaire</th>
                                      <th>Quantité commandée</th>
                                      <th>Total</th>
                                      

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <h3>Commande N <sup>0</sup> @php
                                            echo $num_client;
                                          @endphp</h3>
                                    
                                    @foreach($Commandes as $value => $key)
                  <tr class="data-heading">
                      
                          @if ($key)
                          <td>{{$key->nom_Clt}}</td>
                          <td>{{$key->design_Prdt}}</td>
                                  <td>{{$key->model_Prdt}}</td>
                          <td>{{$key->PV_Prdt}}</td>
                      @endif
                          <td>{{$key->Qte_Cmde}}</td>
                          <td>{{$key->PV_Prdt * $key->Qte_Cmde}}  FCFA </td>
                        
                    </tr>
                    @endforeach
                    <tr class="odd gradeX">
                    <td> 
                                Montant total à régler: {{$total}} FCFA
                      </td> 
                    </tr> 
                            </tbody>
                            <tfoot>
                                      
                          </tfoot>
                      </table>
                  </div>
                  <div class="form-group">
                     <input class="form-control" type="hidden" id="" name="code" value="{{$num_client}}" placeholder="Requis"  /> 
                      <label class="control-label">Type de  règlement</label>
                            <select class="custom-select" name="reglem" id="">
                            <option value=" espèce"> espèce</option>
                            <option value=" chèque"> chèque </option>
                              <option value=" carte"> carte bancaire</option>
                              
                            </select>
                            
                            {!! $errors->first('reglem','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Remise</label>
                    <input class="form-control" type="text" name="remise" placeholder="Entrer le montant" value="{{ old('remise') }}">
                    {!! $errors->first('remise','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Montant</label>
                    <input class="form-control" type="text" name="mont" placeholder="Entrer le montant" value="{{ old('mont') }}">
                    {!! $errors->first('mont','<p class="error-msg"> :message</p>')!!}
                  </div>
                  <div class="form-group">
                    <label class="control-label">Echeance</label>
                    <input class="form-control" type="date" name="echeance" placeholder="Entrer l'echeance" value="{{ old('echeance') }}">
                    {!! $errors->first('echeance','<p class="error-msg"> :message</p>')!!}
                  </div>
                  
                  
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Enregistrer</button>
                  <button class="btn btn-primary" type="reset">Annuler</button>
                   
                    <a style="align:right" href="/facture/{{$num_client}}" class="btn btn-info">
                     Imprimer la facture  </a>
                      
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
