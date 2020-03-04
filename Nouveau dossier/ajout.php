<?php
include("entete.phtml");

require "db.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion


$req = "SELECT * FROM categories";
$resultat = $db->query($req);
$categorie = $resultat->fetch(PDO::FETCH_OBJ);
?>

<main class="d-flex">
    <section class="col-lg-8 col-lg-6" id="left">

    <form action="ajout_valide.php" method="POST" enctype="multipart/form-data" class="m-3">

      <div class="form-group">
        <label for="ajout_ref">Référence :</label>
        <input type="text" id="ajout_ref" class="form-control" name="ajout_ref">
      </div>

      <div class="form-group">
        <label for="ajout_cat">Catégorie :</label>

        <select name="ajout_cat" id="ajout_cat">
        <?php while ($categorie = $resultat->fetch(PDO::FETCH_OBJ)) { ?>
        <option value="<?php echo $categorie->cat_id ;?>"><?php echo $categorie->cat_nom ;?></option>
        <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="ajout_lib">Libellé :</label>
        <input type="text" id="ajout_lib" class="form-control" name="ajout_lib">
      </div>

      <div class="form-group">
        <label for="ajout_description">Description :</label>
        <textarea id="ajout_description" class="form-control" name="ajout_description"></textarea>
      </div>

      <div class="form-group">
        <label for="ajout_prix">Prix :</label>
        <input type="text" id="ajout_prix" class="form-control" name="ajout_prix">
      </div>

      <div class="form-group">
        <label for="ajout_stock">Stock :</label>
        <input type="text" id="ajout_stock" class="form-control" name="ajout_stock">
      </div>

      <div class="form-group">
        <label for="ajout_couleur">Couleur :</label>
        <input type="text" id="ajout_couleur" class="form-control" name="ajout_couleur">
      </div>

      <div class="form-group">
        <p><label for="fichier">Photo du produit :</label></p>
        <input type="file" name="fichier" id="fichier">
      </div>

      <div class="d-flex" id="product">
        <p class="mr-5">Produit bloqué :</p>
        <div class="form-check">
          <input type="radio" value="oui" class="form-check-input radio" id="ajout_oui" name="ajout_product">
          <label for="ajout_oui" class="form-check-label mr-5">Oui</label>
        </div>
        <div class="form-check">
          <input type="radio" value="non" class="form-check-input radio" id="ajout_non" name="ajout_product">
          <label for="ajout_non" class="form-check-label">Non</label>
        </div>
      </div>
      </section>
  
    <aside class="col-lg-4 col-6 d-flex flex-column text-center" id="right">
        <a href="liste.php"><button type="button" class="btn btn-info p-5 m-5">RETOUR</button></a>
        <div><button type="submit" class="btn btn-success p-5 m-5">AJOUTER LE PRODUIT</button></div> 
    </aside>


    </form>

</main>

<?php
include("pied.phtml");
?>