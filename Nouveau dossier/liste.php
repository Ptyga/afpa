<?php
include("views/entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$requete = "SELECT * FROM produits INNER JOIN categories ON produits.pro_cat_id = categories.cat_id ORDER BY pro_id";
$result = $db->query($requete);
$produits = $result->fetchAll(PDO::FETCH_OBJ);

if (!$result) 
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2]; 
    die("Erreur dans la requête");
}
 
if ($result->rowCount() == 0) 
{
   // Pas d'enregistrement
   die("La table est vide");
}

include("views/liste.phtml");
include("views/pied.phtml");
?>