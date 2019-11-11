@extends('layout')

@section('link')
<link rel="stylesheet" href="{{ asset('css/connection.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <p class="card-title text-center">Se connecter</p>
                <form class="form-signin" action="connect-user" method="post">
                    <div class="form-label-group">
                        <label for="inputEmail">Adresse E-Mail</label>
                        <input type="email" name="mail" class="form-control" placeholder="Adresse E-Mail" required
                            autofocus>
                    </div>
                    <div class="form-label-group" id="password-div">
                        <label for="inputPassword">Mot de passe</label>
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase btn-connection" type="submit">Se connecter</button>
                    <div class="form-label-group">
                        <p class="d-flex justify-content-center"><br/>Étudiant et toujours pas de compte ?</p>
                        <p class="d-flex justify-content-center">Inscrivez vous !</p>
                        <a class="link" href="register"><p id="inscription">S'inscrire</p></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
