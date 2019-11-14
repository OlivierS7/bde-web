@extends('layout')

@section('link')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<p>Produit: {{ $event->event_name }}</p>
<p>Description: {{ $event->event_description }}</p>
<p>Prix: {{ $event->event_price }}€</p>
@foreach ($event->image()->get() as $image)
<img src="/storage/image/{{ $image->image_url }}" alt="">
@endforeach
</form>
@if(Session::get('status') == "Membre BDE")
<form action="{{ route('deleteEvent') }}" method="POST">
    @csrf
    @foreach ($event->image()->get() as $image)
    <input type="hidden" name="id_image" value="{{ $event->image()->get()}}">
    @endforeach
    <input type="hidden" name="id_event" value={{ $event->event_id }}>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary" style="background: #17a2b8">Supprimer cet
                évènementt</button>
        </div>
    </div>
</form>
@endif
@if(Session::get('id'))
@if($inscription)
<form action="{{ route('inscription', $event->event_id) }}" method="POST">
    @csrf
    <input type="submit" value="S'inscrire" name="inscription" id="inscription_button" />
</form>
@else
<form action="{{ route('deinscription', $event->event_id) }}" method="POST">
    @csrf
    <input type="submit" value="Se désinscrire" name="inscription" id="inscription_button" />
</form>
@endif
@if($like)
<form action="{{ route('like', $event->event_id) }}" method="POST">
    @csrf
    <button style="font-size:24px"><i class="fa fa-heart-o" name="like"></i></button>
</form>
@else
<form action="{{ route('unlike', $event->event_id) }}" method="POST">
    @csrf
    <div class='button' id='heart'>
    <button style="font-size:24px;color:red"><i class="fa fa-heart" name="unlike"></i></button>
    </div>
</form>
@endif
@endif
@endsection