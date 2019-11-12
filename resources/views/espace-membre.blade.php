@extends('layout')
@section('link')

@endsection

@section('content')

@if(!empty(Session::all()))
@if(Session::get('status') == "Etudiant")
<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
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
                                <label for="email" class="col-4 col-form-label">Email*</label>
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
                            <form action="user-update-password" method="POST">
                                <div class="form-group row">
                                    <label for="newpass" class="col-4 col-form-label">Ancien mot de passe</label>
                                    <div class="col-8">
                                        <input id="newpass" name="newpass" placeholder="Ancien mot de passe"
                                            class="form-control here" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="newpass" class="col-4 col-form-label">Nouveau mot de passe</label>
                                    <div class="col-8">
                                        <input id="newpass" name="newpass" placeholder="Nouveau mot de passe"
                                            class="form-control here" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Update My
                                            Profile</button>
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
@elseif(Session::get('status') == "Membre BDE")
{{ "
    
    Membre BDE azzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz" }}

@elseif(Session::get('status') == "Personnel CESI")
{{ "
    
    Personnel CESI" }}

@elseif(Session::get('status') == "Admin")
{{ "
    
    Admin" }}

@endif
@endif

@endsection