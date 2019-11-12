@extends('layout')
@section('link')

@endsection

@section('content')

@if(Session::get('status') != null)
<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="#" class="list-group-item list-group-item-action active" style="background: #17a2b8">Profil</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Votre profil</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Prénom</label>
                                <div class="col-8">
                                    <input id="name" name="name" placeholder={{ Session::get('firstname')}}
                                        class="form-control here" type="text" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Nom</label>
                                <div class="col-8">
                                    <input id="lastname" name="lastname" placeholder={{ Session::get('lastname')}}
                                        class="form-control here" type="text" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label>
                                <div class="col-8">
                                    <input id="email" name="email" placeholder={{ Session::get('mail')}}
                                        class="form-control here" required="required" type="text" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Statut</label>
                                <div class="col-8">
                                    <input id="text" name="text" placeholder={{ Session::get('status')}}
                                        class="form-control here" required="required" type="text" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Campus</label>
                                <div class="col-8">
                                    <input id="text" name="text" placeholder={{ Session::get('campus')}}
                                        class="form-control here" required="required" type="text" readonly="readonly">
                                </div>
                            </div>
                            <form action="user-update-password" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="newpass" class="col-4 col-form-label">Ancien mot de passe</label>
                                    <div class="col-8">
                                        <input id="newpass" name="password" placeholder="Ancien mot de passe"
                                            class="form-control here" type="password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="newpass" class="col-4 col-form-label">Nouveau mot de passe</label>
                                    <div class="col-8">
                                        <input id="newpass" name="newPassword" placeholder="Nouveau mot de passe"
                                            class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary" style="background: #17a2b8">Mettre à jour mon
                                            mot de passe</button>
                                    </div>
                                </div>
                            </form>
                            @if(Session::get('status') == ("Personnel CESI") || ("Admin"))
                            <form action="download-images" method="get">
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary" style="background: #17a2b8">Télécharger les
                                            photos postées sur le site du BDE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@elseif(Session::get('status') == "Admin")

@endif

@else
<div class="container">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">Vous n'avez pas accès à ce contenu, veuillez vous inscrire.
        </div>
    </div>
</div>
@endif

@endsection