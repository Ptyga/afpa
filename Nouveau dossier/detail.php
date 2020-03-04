<?php
include("entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions

$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET["id"];
$requete = "SELECT * FROM produits WHERE pro_id=" . $pro_id;

$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ);

$req = "SELECT cat_nom FROM categories WHERE cat_id = $produit->pro_cat_id";
$resu = $db->query($req);
$cat_name = $resu->fetch(PDO::FETCH_OBJ);
?>

<main class="d-flex">
    <section class="col-lg-8 col-lg-6" id="left">
        <h3>ID :</h3>
        <p><?php echo $pro_id; ?></p>

        <h3>Référence :</h3>
        <p><?php echo $produit->pro_ref; ?></p>

        <h3>Catégorie :</h3>
        <p><?php echo $cat_name->cat_nom; ?></p>

        <h3>Libellé :</h3>
        <p><?php echo $produit->pro_libelle; ?></p>

        <h3>Description :</h3>
        <p><?php echo $produit->pro_description; ?></p>

        <h3>Prix :</h3>
        <p><?php echo $produit->pro_prix; ?></p>

        <h3>Stock :</h3>
        <p><?php echo $produit->pro_stock; ?></p>

        <h3>Couleur :</h3>
        <p><?php echo $produit->pro_couleur; ?></p>

        <div class="d-flex" id="product">
            <p class="mr-5">Produit bloqué :</p>
            <div class="form-check">
                <input disabled type="radio" value="oui" class="form-check-input radio" id="oui" name="product" <?php if ($produit->pro_bloque !== null) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                <label for="oui" class="form-check-label mr-5">Oui</label>
            </div>
            <div class="form-check">
                <input disabled type="radio" value="non" class="form-check-input radio" id="non" name="product" <?php if ($produit->pro_bloque == null) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                <label for="non" class="form-check-label">Non</label>
            </div>
        </div>

        <p>Date d'ajout : <?php $date = $produit->pro_d_ajout;
                            echo date("d/m/Y", strtotime($date)); ?></p>
        <p>Date de modification : <?php if ($produit->pro_d_modif == null) {
                                        echo "Jamais modifié";
                                    } else {
                                        $modif = $produit->pro_d_modif;
                                        echo date("d/m/Y H:i", strtotime($modif));
                                    } ?></p>
    </section>

    <aside class="col-lg-4 col-6 d-flex flex-column text-center" id="right">
        <a href="liste.php"><button class="btn btn-primary p-5 m-5">RETOUR</button></a>
        <a href="modif.php?id=<?php echo $produit->pro_id; ?>"><button class="btn btn-warning p-5 m-5">MODIFIER</button></a>
        <a href="delete.php?id=<?php echo $produit->pro_id; ?>" id="delete"><button type="button" class="btn btn-danger p-5 m-5">SUPPRIMER</button></a>
    </aside>
    </form>
</main <?php
        include("pied.phtml");
        ?>