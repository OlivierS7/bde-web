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
        @foreach($products as $product)
            <p>Produit: {{ $product->product_name }}</p>
            <p>Description: {{ $product->product_description }}</p>
            <p><img src="{{ $product->image_url }}"/></p>
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
