@extends('layout')

@section('content')
    @if($products)
    @foreach($products as $product)
        <p>Produit: {{ $product->product_name }}</p>
        <p>Description: {{ $product->product_description }}</p>
        <p>Catégorie: {{ $product->category->category_name }}</p>
        <p>Quantité: {{ $product->quantity }}</p>
        <p><img src="/storage/image/{{ $product->image->image_url }}"/></p>
        <p></p>
    @endforeach
    @endif
    <p>Prix total: {{ $totalPrice }}€</p>
    <form action="{{ route('validateCart') }}" method="POST">
        @csrf
        <input type="submit" value="Confirmer les achats" name="validate" id="validate_button" />
    </form>
@endsection
