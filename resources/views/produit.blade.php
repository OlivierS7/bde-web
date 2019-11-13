@extends('layout')

@section('content')
        <p>Produit: {{ $product->product_name }}</p>
        <p>Description: {{ $product->product_description }}</p>
        <p><img src="/storage/image/{{ $product->image->image_url }}"/></p>
        <p>Prix: {{ $product->product_price }}€</p>

        <form action="{{ route('ajouter', $product->product_id) }}" method="POST">
            @csrf
            <input type="submit" value="Ajouter au panier" name="add" />
        </form>
@endsection
