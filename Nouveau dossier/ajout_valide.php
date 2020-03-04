<?php
include("entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions

$db = connexionBase(); // Appel de la fonction de connexion

$add_ref = $_POST["ajout_ref"];
$add_lib = $_POST["ajout_lib"];
$add_cat = $_POST["ajout_cat"];
$add_description = $_POST["ajout_description"];
$add_prix = $_POST["ajout_prix"];
$add_stock = $_POST["ajout_stock"];
$add_couleur = $_POST["ajout_couleur"];
$pro_d_ajout = date('Y-m-d');

if($_POST['ajout_product'] == "oui") {
    $bloque = 1;
}
if($_POST['ajout_product'] == "non") {
    $bloque = NULL;
}

if(!empty($_FILES)) {

    $img = $_FILES['fichier'];
    $ext = substr(strrchr($img['name'], "."), 1);
    $cut = explode(".",$img['name']);
    $name = $cut[0];
    $allow_ext = array("gif", "jpeg", "jpg", "png");
} 


        if(in_array($ext,$allow_ext)) {

            $requete = "INSERT INTO produits (pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque) 
            VALUES (?,?,?,?,?,?,?,?,?,?)";

            $result = $db->prepare($requete);
            $data = $result->execute(
                [
                    $add_cat, $add_ref, $add_lib, $add_description, $add_prix, $add_stock, $add_couleur, $ext, $pro_d_ajout, $bloque
                ]
            );



            $req = "SELECT pro_id FROM produits ORDER BY pro_id DESC LIMIT 0, 1";
            $res = $db->query($req);

            $id = $res->fetch(PDO::FETCH_OBJ);
            
            move_uploaded_file($img['tmp_name'], "jarditou_photos/".$id->pro_id.".".$ext);
    
        } else {
            $erreur = "Votre fichier n'est pas une image";
        }


    if(isset($erreur)) {
        echo $erreur;
    }

?>


<div class="text-success font-weight-bolder text-center"><h3>Votre produit a bien été ajouté</h3></div>
<div class="text-center"><a href="liste.php" class="text-white"><button type="button" class="btn btn-info">Retour à la liste des produits</button></a></div>

<?php


include("pied.phtml");