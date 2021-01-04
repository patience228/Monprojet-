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
    <div class="container-fluid" align="center">
      <u><h2>Le panier</h2></u>
     
      <br />
    </div>
 <div class="container" text-align="center">
    <div class="row">
    <div class="container-fluid">
<input class="form-control" type="hidden" id="" name="code" value="{{$num_client}}" placeholder="Requis"  />
  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Produit</th>
                    <th>Model</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Supprimer </th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  @foreach(Cart::content() as $produit)
                    <tr class="data-heading">
                      <td> {{ $produit->model->design_Prdt}}</td>  
                       <td> {{ $produit->model->model_Prdt}}</td>    
                       <td> {{ $produit->model->PV_Prdt}}</td>    
                       <td> <input type="number" min="0" value="{{ $produit->qty}}"> </td>    
                        <td>
                         <form  action="{{route('cart.destroy',$produit->rowId)}}" method="POST">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg> 

                         </form>
                        </td>   
                    
                    </tr>
                 @endforeach
           </tbody>
          <tfoot>
                    
        </tfoot>
     </table>
<br />
      <form action="{{route('enregistrer_Cmd')}}" method="POST">
     @csrf

      <button class="btn btn-primary" type="submit"> Enregistrer commande</button>
     </form>
     </div>
     </div>
     </div>
     
     

@endsection