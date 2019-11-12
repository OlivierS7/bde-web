@extends('layout')

@section('link')
<link rel="stylesheet" href="{{ asset('../css/contact.css') }}">
@endsection

@section('content')
<div>
	<h1><p class="card-title text-center">Contactez-nous</p></h1>
</div>
<!------ Include the above in your HEAD tag ---------->
<div class="container">
    <h2 class="text-center">Formulaire de contact</h2>
	<div class="row justify-content-center">
		<div class="col-12 col-md-8 col-lg-6 pb-5">


                    <!--Form with header-->

                    <form action="contact-mail" method="post">
                        <div class="card border-primary rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i>Contactez-nous</h3>
                                    <p class="m-0">Nous vous répondrons le plus rapidement possible</p>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="objet" name="objet" placeholder="Objet" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" placeholder="Ecrivez votre message" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                	<a href="mailto:bdecesi@viacesi.fr">
                                    <input type="submit" value="Envoyer" class="btn btn-info btn-block rounded-0 py-2">
                                </a>
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--Form with header-->


                </div>
	</div>
</div>
<div>
	<h2>Nos Coordonnés</h2>
	<h3>Mail, tel, adresse</h3>
</div>
<div class="clear" style="height:10px;"></div>
<p>Mail : <i class="mail" id = "mail"><a href="mailto:bdecesi@viacesi.fr">bdecesi@viacesi.fr </a></i></p>
<p>Tel : 02 40 00 17 00</p>
<p>Boulevard de l'Université, 44600 Saint-Nazaire</p>

<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2708.1426613373956!2d-2.2596751839912965!3d47.25291357916283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4805689157541fdd%3A0x8a57536453c1e875!2sCampus%20CESI!5e0!3m2!1sfr!2sfr!4v1573562850796!5m2!1sfr!2sfr"></iframe><br />


@endsection
