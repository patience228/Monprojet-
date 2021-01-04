@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Carte</h1>

    <div class="flex">
        <div class="w-1/2">
            {!! $hRate->container() !!}
        </div>
    </div>

     <div class="flex">
        <div class="w-1/2">
            {!! $carte->container() !!}
        </div>
    </div>

    <div class="flex">
        <div class="w-1/2">
            {!! $produit->container() !!}
        </div>
    </div>

    
   
   
    {!! $produit->script() !!}
    {!! $carte->script() !!}
    {!! $hRate->script() !!}


</div>

@endsection