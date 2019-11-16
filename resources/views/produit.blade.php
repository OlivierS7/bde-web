@extends('layout')
@section('link')
    <link rel="stylesheet" href="{{asset('css/produit_simple.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="article">
            <p><strong>{{ $product->product_name }}</strong></p>
            <p>{{ $product->product_description }}</p>
            <div class="grow">
                <img src="/storage/image/{{ $product->image->image_url }}"/>
            </div>



            <p>Prix: {{ $product->product_price }}€</p>
        </div>
        @if(Session::get('status') != null)
            <form action="{{ route('ajouter', $product->product_id) }}" method="POST">
                @csrf
                <input class="btn btn-outline-primary" type="submit" value="Ajouter au panier" name="add" />
            </form>
        @endif

        @if(Session::get('status') == "Membre BDE")
            <form action="{{ route('deleteProduct') }}" method="POST">
                @csrf
                <input type="hidden" name="id_image" value={{ $product->image->image_id }}>
                <input type="hidden" name="id_product" value={{ $product->product_id }}>
                <div class="form-group row">
                    <div class="col-8 mt-1">
                        <button name="submit" type="submit" class="btn btn-primary" style="background: #17a2b8">Supprimer ce produit</button>
                    </div>
                </div>
            </form>
        @endif
    </div>


@endsection
