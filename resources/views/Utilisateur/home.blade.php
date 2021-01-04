@extends('Utilisateur.default')

@section('content')
<div class="container" align= "center">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <h1> Bienvenue !!!</h1>
                        </div>
                    @endif

                    @foreach ($Produits as $value)
                        @if($value->Qte_achete <= 0)
                          <div class="alert btn-danger">
                            <p class="lead text-center"> <b>Rupture de Stock du produit : {{$value->design_Prdt}}</b> </p>
                          </div>
                        @endif
                    @endforeach

    <div class="row">

      
<div class="col-md-2">
  <a href="{{route('ind_Cmd')}}" class="thumbnail">
    <img src="cmd.JPG" class="img-responsive" width=100%  alt="...">
  </a>  <h4 class="text-center">Prendre une commande</h4>
</div>
<div class="col-md-2">
  <a href="{{route('liste_Clt')}}" class="thumbnail">
    <img src="veh.JPG" width=100%  height=80% alt="...">
  </a>  <h4 class="text-center">Voir La liste de mes Clients </h4>
</div>

<div class="col-md-4">
  <a href="{{route('liste_Cmd')}}" class="thumbnail">
    <img src="scan.jpg" class="img-responsive"  width=100% alt="...">
  </a>  <h4 class="text-center">Voir La liste de mes Commandes</h4>
</div>

<div class="col-md-4">
  <a href="{{route('liste_Prdt')}}" class="thumbnail">
    <img src="prdt.JPG" class="img-responsive"width=100%  alt="...">
  </a>  <h4 class="text-center">Afficher tous les Produits</h4>
</div>


</div>
</div>
@endsection
