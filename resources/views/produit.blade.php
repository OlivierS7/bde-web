@extends('layout')

@section('content')
    @foreach($product as $unique)
        <p>Produit: {{ $unique->product_name }}</p>
        <p>Description: {{ $unique->product_description }}</p>
        <p><img src="{{ $unique->image_url }}"/></p>
        <p>Prix: {{ $unique->product_price }}€</p>
    @endforeach
@endsection
