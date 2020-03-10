<?php
include("../views/entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions
require "fonctions.php";

$db = connexionBase(); // Appel de la fonction de connexion

$pro_id = $_GET["id"];
$produit = prod_cat($db, $pro_id);


include("../views/detail.phtml");
include("../views/pied.phtml");