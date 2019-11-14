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
        @if(Session::get('status') == "Membre BDE")
        <form action="{{ route('deleteProduct') }}" method="POST">
            @csrf
            <input type="hidden" name="id_image" value={{ $product->image->image_id }}>
            <input type="hidden" name="id_product" value={{ $product->product_id }}>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary" style="background: #17a2b8">Supprimer ce produit</button>
                </div>
            </div>
        </form>
        @endif
@endsection
