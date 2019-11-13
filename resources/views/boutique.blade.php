@extends('layout')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/boutique.css') }}">
@endsection

@section('content')

    <div class="container-fluid search-art1">
        <div class="col-md-4 alone_border" id="articles1">
                <p style="color: orange">Un article en particulier ?</p>
        </div>
    </div>
        @if(Session::get('status') == "Membre BDE")
        <form action="insertProduct" method="get">
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary" style="background: #17a2b8">Créer un nouveau produit</button>
                </div>
            </div>
        </form>
        @endif
        @foreach($products as $product)
            <p>Produit: {{ $product->product_name }}</p>
            <p>Description: {{ $product->product_description }}</p>
            <p><img src="{{ $product->image_url }}"/></p>
            <form action="/produit/{{ $product->product_id }}" method="POST">
            @csrf
                <input type="submit" value="Plus sur ce produit" name="product_id" id="product_button" />
            </form>
        @endforeach
        <div class="row justify-content-between">

            <div class="top_articles col-3 " id="articles2">
                    <p>N°1 des ventes</p>
                    <div class="row">
                        <div class="col-12">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum neque, quis dictum augue. In.
                        </div>
                        <div class="col-12">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum neque, quis dictum augue. In.
                        </div>
                    </div>
            </div>



            <div class="top_articles col-3 offset-1" id="articles2">
                <p>N°2 des ventes</p>
                    <div class="row">
                        <div class="col-12">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum neque, quis dictum augue. In.
                        </div>
                        <div class="col-12">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum neque, quis dictum augue. In.
                        </div>
                    </div>
            </div>


            <div class="top_articles col-3 offset-1" id="articles2">
                <p>N°3 des ventes</p>
                <div class="row">
                    <div class="col-12 ">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum neque, quis dictum augue. In.
                    </div>
                    <div class="col-12">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum neque, quis dictum augue. In.
                    </div>
                </div>
            </div>
        </div>
    <script src="{{ asset('js/accueil_boutique.js') }}"></script>

@endsection
