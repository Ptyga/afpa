<?php
include("entete.phtml");
require "db.php"; // Inclusion de notre bibliothèque de fonctions

$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET["id"];
$db = connexionBase(); // Appel de la fonction de connexion
$requete = "SELECT * FROM produits INNER JOIN categories ON produits.pro_cat_id = categories.cat_id";
$result = $db->query($requete);
$produit = $result->fetch(PDO::FETCH_OBJ);

$req = "SELECT * FROM categories";
$resultat = $db->query($req);
$categorie = $resultat->fetch(PDO::FETCH_OBJ);
?>

<main class="d-flex">
    <section class="col-lg-8 col-lg-6" id="left">

    <form action="modif_valide.php" method="POST" class="m-3">
      <div class="form-group">
        <label for="id">ID :</label>
        <input type="text" id="id" class="form-control" name="id" value=<?php echo $pro_id; ?>>
      </div>

      <div class="form-group">
        <label for="ref">Référence :</label>
        <input type="text" id="ref" class="form-control" name="ref" value=<?php echo $produit->pro_ref; ?>>
      </div>

      <div class="form-group">
        <label for="cat">Catégorie :</label>

        <select name="categories" id="categories">
        <?php while ($categorie = $resultat->fetch(PDO::FETCH_OBJ)) { ?>
        <option value="<?php echo $categorie->cat_id ;?>"><?php echo $categorie->cat_nom ;?></option>
        <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="lib">Libellé :</label>
        <input type="text" id="lib" class="form-control" name="lib" value=<?php echo $produit->pro_libelle; ?>>
      </div>

      <div class="form-group">
        <label for="description">Description :</label>
        <textarea id="description" class="form-control" name="description"><?php echo $produit->pro_description; ?></textarea>
      </div>

      <div class="form-group">
        <label for="prix">Prix :</label>
        <input type="text" id="prix" class="form-control" name="prix" value=<?php echo $produit->pro_prix; ?>>
      </div>

      <div class="form-group">
        <label for="stock">Stock :</label>
        <input type="text" id="stock" class="form-control" name="stock" value=<?php echo $produit->pro_stock; ?>>
      </div>

      <div class="form-group">
        <label for="couleur">Couleur :</label>
        <input type="text" id="couleur" class="form-control" name="couleur" value=<?php echo $produit->pro_couleur; ?>>
      </div>

      <div class="d-flex" id="product">
        <p class="mr-5">Produit bloqué :</p>
        <div class="form-check">
          <input type="radio" value="oui" class="form-check-input radio" id="oui" name="product" <?php if ($produit->pro_bloque !== null) {
                                                                                                    echo "checked";
                                                                                                  } ?>>
          <label for="oui" class="form-check-label mr-5">Oui</label>
        </div>
        <div class="form-check">
          <input type="radio" value="non" class="form-check-input radio" id="non" name="product" <?php if ($produit->pro_bloque == null) {
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
        <a href="detail.php?id=<?php echo $produit->pro_id; ?>"><button type="button" class="btn btn-success p-5 m-5">RETOUR</button></a>
        <a href="delete.php?id=<?php echo $produit->pro_id; ?>" id="delete"><button type="button" class="btn btn-danger p-5 m-5">SUPPRIMER</button></a>
        <button type="submit" class="btn btn-info p-5 m-5">VALIDER LES MODIFICATIONS</button>
  </aside>

    </form>

</main>

<?php
include("pied.phtml");
?>