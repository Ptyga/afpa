<?php
/*
 * --------------------------------------------------------
 * afpa_securite/php_injection_sql/moncompte.php
 * ---------------------------------------------------------
 */
session_start();
$sTitle = "Injection SQL - Sécurité";

require "_header.php";
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 border-bottom pb-3 mb-3">
            <h1>Mon compte</h1>
        
         </div> 
    </div>     
    <div class="row">
        <div class="col-12">
        <?php
      if (isset($_SESSION["connected"]) && $_SESSION["connected"]==TRUE) 
      {
         echo "Le solde de votre compte est de -1500 € !!!!";
      } 
      else 
      {
         ?>
          <div class="col-12  alert alert-danger" role="alert">   
          Vous n'êtes pas autorisé à consulter cette page.
          </div>
         <?php
      }
      ?>
        </div> 
		  </div> 
		  <div class="row border-top pb-3 mt-3">
        	<div class="col-12">  
  				<a href="index.php" title="Accueil">Retour formulaire</a>	
        	</div> 
		  </div> 
</div> <!-- .container -->
<?php
require "_footer.php";
?>
</body>
</html>