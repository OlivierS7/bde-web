@extends('layout')

@section('link')
<link rel="stylesheet" href="{{ asset('css/insertProduct.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <p class="card-title text-center">Créer un commentaire</p>
                <form class="form-signin" action="{{ route('comment')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-label-group">
                        <label>A propos de cet évènement:</label>
                        <textarea type="text" name="event_comment" class="form-control"
                            placeholder="Que pensez vous de cet évènement ?" required></textarea>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase btn-connection" type="submit" name="event_id" value="{{ $event_id }}">Poster
                        l'évènement</button>
                    @include('flash-message')
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
