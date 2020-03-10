<?php
include("../views/entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions
require "fonctions.php";

$db = connexionBase(); // Appel de la fonction de connexion

$categories = categories($db);

if(isset($_POST) && !empty($_POST)) {
    
    $add_product = $_POST["ajout_product"];
    $add_stock = intval(htmlspecialchars($_POST["ajout_stock"]));
    $add_prix = intval(htmlspecialchars($_POST["ajout_prix"]));
    $add_lib = htmlspecialchars($_POST["ajout_lib"]);
    $add_ref = htmlspecialchars($_POST["ajout_ref"]);
    $add_cat = htmlspecialchars($_POST["ajout_cat"]);
    $add_description = htmlspecialchars($_POST["ajout_description"]);
    $add_couleur = htmlspecialchars($_POST["ajout_couleur"]);
    $pro_d_ajout = date('Y-m-d');
    $errors_ajout = [];
    $result = pro_ref($db, $add_ref);

    if (isset($add_ref) && !empty($add_ref)) {
        if ($result == true) {
                $error1 = "<p>Cette référence existe déjà !</p>";
                $errors_ajout["ajout_ref"] = $error1;
            }
    } else {
        $error1 = "<p>Vous devez renseigner la référence du produit</p>";
        $errors_ajout["ajout_ref"] = $error1;
    }

    if (!isset($add_lib) || empty($add_lib)) {
        $error2 = "<p>Vous devez renseigner le libellé du produit</p>";
        $errors_ajout["ajout_lib"] = $error2;
    }

    if (!isset($add_prix) || empty($add_prix) || $add_prix <= 0) {
        $error3 = "<p>Vous devez renseigner le prix du produit</p>";
        $errors_ajout["ajout_prix"] = $error3;
    }

    if (!isset($add_stock) || empty($add_stock) || $add_stock < 0) {
        $error4 = "<p>Vous devez renseigner le stock disponible du produit</p>";
        $errors_ajout["ajout_stock"] = $error4;
    }
    
    if (isset($add_product) && $add_product == "oui") {
            $bloque = 1;
    } else {
            $bloque = null;
    }
    
    if (isset($_FILES['fichier']) && !empty($_FILES['fichier'])) {

        $img = $_FILES['fichier'];
        $ext = substr(strrchr($img['name'], "."), 1);
        $allow_ext = array("gif", "jpeg", "jpg", "png");

    } else { $ext = "jpg";}

    if(in_array($ext, $allow_ext)) {

        $data = [$add_cat, $add_ref, $add_lib, $add_description, $add_prix, $add_stock, $add_couleur, $ext, $pro_d_ajout, $bloque];
        ajout_prod($db, $data);
        $id = photo_name($db);
        move_uploaded_file($img['tmp_name'], "../jarditou_photos/" . $id->pro_id . "." . $ext);
    } else {
        $error6 = "<p>Votre fichier n'est pas une image</p>";
        $errors_ajout["ext"] = $error6;
    }
    
    if (count($errors_ajout) == 0) {

        header('Location: liste.php');
    } else {
        $_POST["errors_ajout"] = $errors_ajout;

        include("../views/ajout.phtml");
    }
} else {
    header('Location: ajout.php');
}

include("../views/pied.phtml");