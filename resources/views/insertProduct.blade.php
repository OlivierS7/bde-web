@extends('layout')

@section('link')

@endsection

@section('content')
@if(Session::get('status') == "Membre BDE")
<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <p class="card-title text-center">Insérer un nouveau produit</p>
                <form class="form-signin" action="insertDatabaseProduct" method="post">
                    @csrf
                    <div class="form-label-group">
                        <label for="inputCampus">Catégorie</label>
                        <select class="form-control" name="product_category">
                            @foreach ($categories as $category)
                            <option value={{ $category->category_id }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-label-group">
                        <label>Nom du produit</label>
                        <input type="text" name="product_name" class="form-control" placeholder="Nom du produit"
                            required>
                    </div>
                    <div class="form-label-group">
                        <label>Description du produit</label>
                        <textarea type="text" name="product_description" class="form-control"
                            placeholder="Description du produit" required></textarea>
                    </div>
                    <div class="form-label-group">
                        <label>Prix du produit</label>
                        <input type="text" name="product_price" class="form-control" placeholder="Prix du produit"
                            required>
                    </div>
                    <div class="form-label-group d-flex flex-column">
                        <label>Image du produit</label>
                        <input type="file" name="product_image" class="custom-file-input">
                    </div>

                    <button class="btn btn-lg btn-primary btn-block text-uppercase btn-connection" type="submit">Se
                        connecter</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endif

@endsection