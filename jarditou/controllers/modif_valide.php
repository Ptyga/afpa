<?php
include("../views/entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions
require "fonctions.php";

$db = connexionBase(); // Appel de la fonction de connexion

if (isset($_POST) && !empty($_POST)) {

    $pro_id = $_POST["id"];

    if (isset($pro_id) && !empty($pro_id)) {

        $errors_modif = [];
        $pro_cat = $_POST["categories"];
        $pro_ref = htmlspecialchars($_POST["ref"]);
        $pro_lib = htmlspecialchars($_POST["lib"]);
        $pro_description = htmlspecialchars($_POST["description"]);
        $pro_prix = intval(htmlspecialchars($_POST["prix"]));
        $pro_stock = intval(htmlspecialchars($_POST["stock"]));
        $pro_couleur = htmlspecialchars($_POST["couleur"]);
        $result = pro_ref($db, $pro_ref);

        if (isset($pro_ref) && !empty($pro_ref)) {
            if($result == true) {
                if ($result->pro_id !== $pro_id) {
                    $error2 = "<p>Cette référence existe déjà !</p>";
                    $errors_modif["ref"] = $error2;
                }
            }
        } else {
            $error2 = "<p>Vous devez renseigner une référence</p>";
            $errors_modif["ref"] = $error2;
        }

        if(!isset($pro_cat) || empty($pro_cat)) {
            $error1 = "<p>Vous devez renseigner une catégorie</p>";
            $errors_modif["cat"] = $error1;
        }

        if (!isset($pro_lib) || empty($pro_lib)){
            $error3 = "<p>Vous devez renseigner un libellé</p>";
            $errors_modif["lib"] = $error3;
        }

        if (!isset($pro_prix) || empty($pro_prix)){
            $error4 = "<p>Vous devez renseigner un prix</p>";
            $errors_modif["prix"] = $error4;
        }

        if (!isset($pro_stock) || empty($pro_stock)) {
            $error5 = "<p>Vous devez renseigner la quantité en stock</p>";
            $errors_modif["stock"] = $error5;
        }

        if (isset($_POST['product']) && !empty($_POST['product'])) {
            if($_POST['product'] == "oui") {
                $bloque = 1;
            }
            if($_POST['product'] == "non") {
                $bloque = NULL;
            }
        }

        if(count($errors_modif) == 0) {
            $requete_modif = [$pro_ref, $pro_cat, $pro_lib, $pro_description, $pro_prix, $pro_stock, $pro_couleur, $bloque, $pro_id];
            
            modif_prod($db, $requete_modif);
            
            header('Location: detail.php?id='.$pro_id);
        } else {
            $_POST["errors_modif"] = $errors_modif;

            $produit = prod_cat($db, $pro_id);
            $categories = categories($db);
            
            include("../views/modif.phtml");
        }
    }
} else {
    header('Location: liste.php');
}

include("../views/pied.phtml");