@extends('layout')
@section('link')
<link rel="stylesheet" href="{{asset('css/home.css')}}" />
@endsection
@section('content')
<div class="container">
    <div class="home_border">
        <h2>Bienvenue sur le site du <strong>BDE</strong></h2>
        <p>Ce site a été réalisé par <strong>4</strong> étudiants du CESI soyez indulgeants :) </p>
        <p>Sur ce site vous pouvez accéder à : </p>
        <ul>
            <li>Une boutique</li>
            <li>Une page d'évènements</li>
            <li>Votre espace membre (uniquement si vous êtes déjà inscrit-e-s</li>
            <li>Une page pour nous contacter</li>
        </ul>
        <p>N'hésitez pas à regarder les mentions légales ansi que les conditions générales de ventes du site.</p>
    </div>

</div>
@endsection
