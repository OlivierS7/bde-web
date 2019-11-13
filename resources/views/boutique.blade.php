@extends('layout')
@section('link')
    <link rel="stylesheet" href="{{ asset('css/boutique.css') }}">
@endsection

@section('content')

    <div class="container-fluid search-art1">
        <div class="col-4 alone_border" id="Alone">
            <p style="color: orange">Un article en particulier ?</p>
            <form>
                <input type="text" class="form-control" id="tags">
                <button type="submit">Rechercher</button>
            </form>

        </div>
    </div>


        <div class="row justify-content-between" id="articles1">

            <div class="top_articles col-3 " id="articles2">
                    <p>N°1 des ventes</p>
                    <div class="row">
                        <div class="col-12">
                            <img src="{{asset('img/cesi_logo.jpg')}}" class="images">
                        </div>
                        <div class="col-12">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum neque, quis dictum augue. In.
                        </div>
                    </div>
            </div>



            <div class="top_articles col-3 offset-1" id="articles3">
                <p>N°2 des ventes</p>
                    <div class="row">
                        <div class="col-12">
                            <img src="{{asset('img/cesi_logo.jpg')}}" class="images">
                        </div>
                        <div class="col-12">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum neque, quis dictum augue. In.
                        </div>
                    </div>
            </div>


            <div class="top_articles col-3 offset-1" id="articles4">
                <p>N°3 des ventes</p>
                <div class="row">
                    <div class="col-12 ">
                        <img src="{{asset('img/cesi_logo.jpg')}}" class="images">
                    </div>
                    <div class="col-12">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ornare porttitor hendrerit. Sed eu dictum neque, quis dictum augue. In.
                    </div>
                </div>
            </div>
        </div>




    <script src="{{ asset('js/accueil_boutique.js') }}"></script>


@endsection
