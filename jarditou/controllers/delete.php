<?php
require "db.php"; // Inclusion de notre bibliothèque de fonctions
require "fonctions.php";

$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET["id"];

$produit = prod_cat($db, $pro_id);

if(isset($pro_id) && $pro_id = $produit->pro_id) {
    delete_prod($db, $pro_id);
}
header("Location: liste.php");