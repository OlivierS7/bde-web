<?php
$bdd = new PDO('mysql:host=localhost;dbname=bde-web;charset=utf8', 'root', '');
$a = $_GET['term'];
$requete = $bdd->prepare("SELECT * FROM products WHERE product_name LIKE :a");
$requete->execute(array('term' => '%'.$a.'%'));
$array = array();

while($donnee = $requete->fetch())
{
    array_push($array, $donnee['product_name']);
}
echo json_encode($array);
?>

