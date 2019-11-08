@extends('layout')

@section('link')
<link rel="stylesheet" href="{{ asset('../css/register.css') }}">
@endsection

@section('content')
<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <div class="card card-signin my-5">
        <div class="card-body">
            <p class="card-title text-center">S'inscrire</p>
            <form class="form-signin" action="add-user" method="post">
                @csrf
                <div class="form-label-group">
                    <label for="inputEmail">Adresse E-Mail</label>
                    <input type="email" name="mail" class="form-control" placeholder="Adresse E-Mail" required
                        autofocus>
                </div>
                <div class="form-label-group">
                    <label for="inputFirstName">Prénom</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Jean" required
                        autofocus>
                </div>
                <div class="form-label-group">
                    <label for="inputLastName">Nom</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Dupont" required
                        autofocus>
                </div>
                <div class="form-label-group">
                    <label for="inputCampus">Campus</label>
                    <select class="form-control" name="campus">
                            <option value="1">Saint-Nazaire</option>
                            <option value="2">Bordeaux</option>
                            <option value="3">Rouen</option>
                            <option value="4">Arras</option>
                            <option value="5">Caen</option>
                            <option value="6">Lille</option>
                            <option value="7">Angoulême</option>
                            <option value="8">Brest</option>
                            <option value="9">La Rochelle</option>
                            <option value="10">Le Mans</option>
                            <option value="11">Nantes</option>
                            <option value="12">Paris (la défense)</option>
                            <option value="13">Paris (nanterre)</option>
                            <option value="14">Orléans</option>
                            <option value="15">Dijon</option>
                            <option value="16">Nancy</option>
                            <option value="17">Reims</option>
                            <option value="18">Strasbourg</option>
                            <option value="19">Montpellier</option>
                            <option value="20">Pau</option>
                            <option value="21">Toulouse</option>
                            <option value="22">Aix-En-Provence</option>
                            <option value="23">Grenoble</option>
                            <option value="24">Lyon</option>
                            <option value="25">Nice</option>

                    </select>
                </div>
                <div class="form-label-group" id="password-div">
                    <label for="inputPassword">Mot de passe</label>
                    <input type="password" name="password"
                        class="form-control champ @error('password') is-invalid @enderror" id="passwordInscription"
                        placeholder="Mot de passe" required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                    @enderror
                </div>
                <div class="form-label-group" id="password-div2" style="margin-bottom: 3%;">
                    <label for="inputPassword">Vérification du mot de passe</label>
                    <input type="password" name="passwordVerif" class="form-control champ" id="passwordConfirmation"
                        placeholder="Mot de passe" required>
                    <p id="passwordMismatch">Les mots de passes ne correspondent pas.</p>
                    <p id="passwordMatch">Les mots de passes correspondent.</p>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" id="inscriptionButton"
                    type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="{{ asset('js/passwordVerification.js') }}"></script>
@endsection