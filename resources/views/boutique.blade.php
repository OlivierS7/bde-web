@extends('layout')
@section('link')
<link rel="stylesheet" href="{{ asset('css/boutique.css') }}">
<link rel="stylesheet" href="{{ asset('css/easy-autocomplete.min.css') }}">
@endsection

@section('content')


<div class="container-fluid search-art1">

        <div class="col-4 alone_border" id="Alone">
            <p style="color: rgb(248, 200, 44)">Un article en particulier ?</p>
            <div class="form-inline">
                <input type="search" class="form-control" id="recherche" placeholder="Article...">
            </div>

            <div class="col">
                <a class="btn  bg-light mt-1" href="sortDescPriceProduct">Trier les produits par prix décroissant</a>
                <a class="btn  bg-light mt-1" href="sortASCPriceProduct">"Trier les produits par prix croissant</a>
            </div>


            <form class="col form-signin mt-1" action="sortCategoryProduct" method="get">
                @csrf
                <select class="form-control" name="product_category">
                    <option value="1">Sports et Loisirs</option>
                    <option value="2">Figurine</option>
                    <option value="3">Vêtements</option>
                    <option value="4">Electronique</option>
                    <option value="5">Soirée</option>
                    <option value="6">Accessoires</option>
                    <option value="7">Jeux</option>
                    <option value="8">Sac</option>
                </select>
                <button class="col-6 btn btn-primary mt-1" type="submit">Effectuer la recherche</button>
            </form>

            @if(Session::get('status') == "Membre BDE")
            <form action="insertProduct" method="get">
                <div>
                    <button name="panier" type="submit" class="btn btn-outline-secondary mt-2" id="add_article">Créer un nouveau
                        produit</button>
                </div>
            </form>
            @endif
            @if(Session::get('status') != NULL)
                <form action="{{ route('panier') }}" method="get">
                    <div>
                        <button name="submit" type="submit" class="btn btn-outline-primary mt-2 mb-1" id="cart_button">Votre panier</button>
                    </div>
                </form>
            @endif
        </div>

</div>



<div class="row justify-content-between" id="articles1">

    <div class="top_articles col-3" id="articles2">
        <p><strong>N°1</strong> des ventes</p>
        <div class="row">
            <div class="col-12">
                <img src="{{asset('img/cesi_logo.jpg')}}">
            </div>
            <div class="col-12">
            </div>
        </div>
    </div>



    <div class="top_articles col-3 offset-1" id="articles3">
        <p><strong>N°2</strong> des ventes</p>
        <div class="row">
            <div class="col-12">
                <img src="{{asset('img/cesi_logo.jpg')}}">
            </div>
            <div class="col-12">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum
                neque, quis dictum augue. In.
            </div>
        </div>
    </div>


    <div class="top_articles col-3 offset-1" id="articles4">
        <p><strong>N°3</strong> des ventes</p>
        <div class="row">
            <div class="col-12 ">
                <img src="{{asset('img/cesi_logo.jpg')}}">
            </div>
            <div class="col-12">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum
                neque, quis dictum augue. In.
            </div>
        </div>
    </div>
</div>



<div class="row justify-content-between bout_resp">
    @foreach($products as $product)
    <div class=" col-2 mr-1 bout_resp1">
        <div class="row d-flex flex-column justify-content-center top_articles">
            <div class="col-12">
                <img src="/storage/image/{{ $product->image->image_url }}" />
            </div>

            <div class="col-12">
                <p>
                    <p><strong><span>{{ $product->product_name }}</span></strong></p>
                    <p>{{ $product->product_description }}</p>
                    <p>{{ $product->product_price }}€</p>
                </p>
            </div>

            <form action="/produit/{{ $product->product_id }}" method="GET">
                @csrf
                <button class="form-control more" type="submit" name="product_id" id="product_button">Plus sur ce
                    produit</button>
            </form>

        </div>

    </div>
    @endforeach
</div>
@endsection


@section('script')
<script src="{{ asset('js/jquery.easy-autocomplete.min.js') }}"></script>
<script src="{{ asset('js/autocompletion.js') }}"></script>
<script src="{{ asset('js/accueil_boutique.js') }}"></script>
@endsection
