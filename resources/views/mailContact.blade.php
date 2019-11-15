@isset ($objet, $content, $mail)
<p>Objet du mail : {{ $objet }}</p>

<p>Contenu du mail : {{ $content }}</p>

<p>Adresse E-Mail de l'étudiant : {{ $mail }}</p>
@endisset

@isset ($produits, $id, $totalPrice, $mail, $firstName, $lastName)

<p>Nom du client : {{ $firstName }} {{ $lastName }}</p>

<p>Adresse du client : {{ $mail }}</p>
    
@foreach ($produits as $produit)

<p>Nom du produit : {{ $produit->produit->product_name }}</p>

<p>Description du produit : {{ $produit->produit->product_description }}</p>

<p>Prix Unitaire : {{ $produit->produit->product_price }}€</p>

<p>Quantité : {{ $produit->quantity }}</p>

<p>--------------------------------------------------------------</p>
    
@endforeach

<p>Prix total de la commande : {{ $totalPrice }}€</p>

@endisset


