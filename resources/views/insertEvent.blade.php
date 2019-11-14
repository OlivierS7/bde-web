@extends('layout')

@section('link')
<link rel="stylesheet" href="{{ asset('css/insertProduct.css') }}">
@endsection

@section('content')
@if(Session::get('status') == "Membre BDE")
<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <p class="card-title text-center">Créer un évènement</p>
                <form class="form-signin" action="insertDatabaseEvent" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-label-group">
                        <label>Nom de l'évènement :</label>
                        <input type="text" name="event_name" class="form-control" placeholder="Nom de l'évènement"
                            required>
                    </div>
                    <div class="form-label-group">
                        <label>Description de l"évènement (20 caractères minimum) :</label>
                        <textarea type="text" name="event_description" class="form-control"
                            placeholder="Description de l'évènement" required></textarea>
                    </div>
                    <div class="form-label-group">
                        <label>Prix de l'évènement :</label>
                        <input type="text" name="event_price" class="form-control" placeholder="Prix de l'évènement"
                            required>
                    </div>
                    <div class="form-label-group">
                        <label>Date de l'évènement :</label>
                        <input type="date" name="event_date" class="form-control"
                            required>
                    </div>
                    <div class="form-label-group d-flex flex-column">
                        <label>Image de l'évènement :</label>
                        <input type="file" name="event_image">
                    </div>

                    <button class="btn btn-lg btn-primary btn-block text-uppercase btn-connection" type="submit">Poster
                        l'évènement</button>
                    @include('flash-message')
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@endsection