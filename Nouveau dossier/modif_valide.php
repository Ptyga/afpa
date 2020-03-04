<?php
include("entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions

$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_POST["id"];
$pro_ref = $_POST["ref"];
$pro_lib = $_POST["lib"];
$pro_cat = $_POST["categories"];
$pro_description = $_POST["description"];
$pro_prix = $_POST["prix"];
$pro_stock = $_POST["stock"];
$pro_couleur = $_POST["couleur"];

$requete = "SELECT * FROM produits INNER JOIN categories ON produits.pro_cat_id = categories.cat_id";
$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ);

$req = "SELECT * FROM categories";
$resultat = $db->query($req);
$categorie = $resultat->fetch(PDO::FETCH_OBJ);


if(isset($pro_id)) {
    $modif_ref = "UPDATE produits SET pro_ref ='". $pro_ref ."' WHERE pro_id=" . $pro_id;
    $result_ref = $db->query($modif_ref);

    $modif_cat = "UPDATE produits SET pro_cat_id ='". $pro_cat ."' WHERE pro_id=" . $pro_id;
    $result_cat = $db->query($modif_cat);

    $modif_libelle = "UPDATE produits SET pro_libelle ='". $pro_lib ."' WHERE pro_id=" . $pro_id;
    $result_libelle = $db->query($modif_libelle);

    $modif_description = "UPDATE produits SET pro_description ='". $pro_description ."' WHERE pro_id=" . $pro_id;
    $result_description = $db->query($modif_description);

    $modif_prix = "UPDATE produits SET pro_prix ='". $pro_prix ."' WHERE pro_id=" . $pro_id;
    $result_prix = $db->query($modif_prix);

    $modif_stock = "UPDATE produits SET pro_stock ='". $pro_stock ."' WHERE pro_id=" . $pro_id;
    $result_stock = $db->query($modif_stock);

    $modif_couleur = "UPDATE produits SET pro_couleur ='". $pro_couleur ."' WHERE pro_id=" . $pro_id;
    $result_couleur = $db->query($modif_couleur);

    $modif_date = "UPDATE produits SET pro_d_modif = NOW() WHERE pro_id=" . $pro_id;
    $result_date = $db->query($modif_date);

    if($_POST['product'] == "oui") {
        $bloque = 1;
    }
    if($_POST['product'] == "non") {
        $bloque = NULL;
    }
    $modif_bloque = "UPDATE produits SET pro_bloque = $bloque WHERE pro_id=" . $pro_id;
    $result_bloque = $db->query($modif_bloque);
}

?>
<div class="text-success font-weight-bolder text-center"><h3>Votre produit a bien été modifié</h3></div>
<div class="text-center"><a href="liste.php" class="text-white"><button type="button" class="btn btn-info">Retour à la liste des produits</button></a></div>

<?php
include("pied.phtml");