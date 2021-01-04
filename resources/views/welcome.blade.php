@extends('layouts.home')

@section('content')
            
            <form action="/welcome" method="POST">
            {{ csrf_field() }}
                <h1>Connexion</h1>
                
                <label><b>Email</b></label>
                <input type="text" placeholder="Entrer l'email" name="email" value="{{old('email')}}" >
                {!! $errors->first('email','<p class="error-msg"> :message</p>')!!}

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" value="{{old('password')}}">
                {!! $errors->first('password','<p class="error-msg"> :message</p>')!!}
    
                <input type="submit" id='submit' value='LOGIN' >
                
            </form>
@stop    