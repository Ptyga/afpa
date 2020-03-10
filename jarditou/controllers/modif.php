<?php
include("../views/entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions
require "fonctions.php";

$db = connexionBase(); // Appel de la fonction de connexion


if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $pro_id = $_GET["id"];
    $produit = prod_cat($db, $pro_id);
    $categories = categories($db);
} else {
    header('Location: liste.php');
}


include("../views/modif.phtml");
include("../views/pied.phtml");