@extends('layout')

@section('content')
        <p>Produit: {{ $event->event_name }}</p>
        <p>Description: {{ $event->event_description }}</p>
        <p>Prix: {{ $event->event_price }}€</p>
        @foreach ($event->image()->get() as $image)
        <img src="/storage/image/{{ $image->image_url }}" alt="">
        @endforeach
@endsection
