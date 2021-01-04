@extends('layouts.home')

@section('content')

<form action="/logout" method="POST">
    {{ csrf_field() }}
    <h1>Déconnexion</h1>
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Votre mot de passe" name="password" value="{{old('password')}}">
        {!! $errors->first('password','<p class="error-msg"> :message</p>')!!}
    
        <input type="submit" id='submit' value='LOGOUT' >
                
 </form>
@stop    