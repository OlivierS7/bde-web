@extends('layout')
@section('link')
<link rel="stylesheet" href="{{asset('css/boutique.css')}}" />
@endsection
@section('content')
    @if($products)
        <div class="row justify-content-between mt-5 pan_resp">
            @foreach($products as $product)
                <div class="col-2 mr-1 pan_resp1">
                    <div class="row d-flex flex-column justify-content-center top_articles">


                    <div class="col-12">
                        <p><strong>{{ $product->product_name }}</strong></p>
                        <img src="/storage/image/{{ $product->image->image_url }}"/>
                    </div>

            <div class="col-12">
                <p>{{ $product->category->category_name }}</p>
                <p>{{ $product->product_description }}</p>
                <p>Prix Unitaire: {{ $product->product_price }}€</p>
                <p>Quantité: {{ $product->quantity }}</p>
            </div>
                        <form action="{{ route('deleteFromCart', $product->product_id) }}" method="GET">
                            @csrf
                            <input type="submit" value="Supprimer un article" name="validate" id="validate_button" />
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

    @endif
    @if($products)
    <p>Prix total: {{ $totalPrice }}€</p>
    <form action="{{ route('validateCart') }}" method="POST">
        @csrf
    <input type="hidden" value="{{ $totalPrice }}" name="totalPrice">
        <input type="submit" value="Confirmer les achats" name="validate" id="validate_button" />
    </form>
        @else
        <p>Vous n'avez aucun produits dans votre panier pour le moment</p>
    @endif
@endsection
@section('script')
<script src="{{asset('js/panier.js')}}"></script>
@endsection
