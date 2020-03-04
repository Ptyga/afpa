<?php
include("entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions

$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET["id"];
$requete = "SELECT * FROM produits WHERE pro_id=" . $pro_id;

$result = $db->query($requete);

// Renvoi de l'enregistrement sous forme d'un objet
$produit = $result->fetch(PDO::FETCH_OBJ);

$req = "SELECT cat_nom FROM categories WHERE cat_id = $produit->pro_cat_id";
$resu = $db->query($req);
$cat_name = $resu->fetch(PDO::FETCH_OBJ);


if(isset($pro_id) && $pro_id = $produit->pro_id) {
    $requete_delete = "DELETE FROM produits WHERE pro_id=".$pro_id;
    $result_delete = $db->query($requete_delete);
    $delete = $result_delete->execute();
}

header("Location: liste.php");




include("pied.phtml");