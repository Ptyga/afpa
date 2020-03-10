<?php
function liste($db) {
    $requete = "SELECT * FROM produits INNER JOIN categories ON produits.pro_cat_id = categories.cat_id ORDER BY pro_id";
    $result = $db->query($requete);
    $produits = $result->fetchAll(PDO::FETCH_OBJ);

    return $produits;
}

function pro_ref($db, $reference) {
    $requete_prod = "SELECT pro_id, pro_ref FROM produits WHERE pro_ref= ?";
    $result = $db->prepare($requete_prod);
    $result->execute([$reference]);
    $ref = $result->fetch(PDO::FETCH_OBJ);
    return $ref;
}

function categories($db) {
    $req = "SELECT * FROM categories";
    $resultat = $db->query($req);
    $categories = $resultat->fetchAll(PDO::FETCH_OBJ);

    return $categories;
}

function prod_cat($db, $pro_id) {
    $requete = "SELECT * FROM produits JOIN categories ON produits.pro_cat_id = categories.cat_id WHERE pro_id= ? ORDER BY pro_id";
    $result = $db->prepare($requete);
    $result->execute([$pro_id]);
    $produit = $result->fetch(PDO::FETCH_OBJ);

    return $produit;
}

function modif_prod($db, $requete_modif) {
    $modif_ref = "UPDATE produits SET pro_ref = ?, pro_cat_id = ?, pro_libelle = ?, pro_description = ?, pro_prix = ?, pro_stock = ?, pro_couleur = ?, pro_d_modif = NOW(), pro_bloque = ? WHERE pro_id= ?";
    $result_ref = $db->prepare($modif_ref);
    $result_ref->execute($requete_modif);
}

function ajout_prod($db, $data) {
    $requete = "INSERT INTO produits (pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, pro_photo, pro_d_ajout, pro_bloque) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $result = $db->prepare($requete);
    $data = $result->execute($data);
}

function photo_name($db) {
    $req = "SELECT pro_id FROM produits ORDER BY pro_id DESC LIMIT 0, 1";
    $res = $db->query($req);
    $id = $res->fetch(PDO::FETCH_OBJ);

    return $id;
}

function delete_prod($db, $pro_id) {
    $requete_delete = "DELETE FROM produits WHERE pro_id=?";
    $result_delete = $db->prepare($requete_delete);
    $delete = $result_delete->execute([$pro_id]);
}