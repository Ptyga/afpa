<?php
/*
 * --------------------------------------------------------
 * afpa_securite/php_injection_sql/exemple1_post.php
 * ---------------------------------------------------------
 */
session_start();
$sTitle = "Injection SQL - Sécurité";
require "_header.php";

require "_connexion.php";
$oDb = connexion();

$login = $_POST['login'];
$password = $_POST['password'];

// L'utilisation de htmlspecialchars() ne change rien
// $login = htmlspecialchars($_POST['login']);
// $password = htmlspecialchars($_POST['password']);
?>
<body>
<div class="container">
     <div class="row mb-3">
        <div class="col-12 ">
            <a href="index.php" title="Accueil">&lt; Accueil</a>            
         </div> <!-- .col -->
    </div> <!-- .row -->    
    <div class="row">
        <div class="col-12 border-bottom pb-3 mb-3">
            <h1>Injection SQL - Sécurité</h1>           
         </div> <!-- .col -->
    </div> <!-- .row -->    
    <div class="row">
        <div class="col-12 alert alert-success" role="alert">
        <?php
      echo "Requête attendue :\n";
      echo "<pre>\n";
      echo "<code>SELECT * FROM users WHERE login='Pierre' AND password='azerty1'</code>\n";
      echo "</pre>\n";
      ?>
			</div> <!-- .col -->
	  </div> <!-- .row -->     
     <div class="row">
        <div class="col-12  alert alert-danger" role="alert">     
              <?php

            // Syntaxes implémentant l'injection SQL
            $postee = "SELECT * FROM users WHERE login='$login' AND password='$password'";
            // $postee = "SELECT * FROM users WHERE login='".$login."' AND password='".$password."'";
            // $postee = "SELECT * FROM users WHERE login='".$_POST["login"]."' AND password='".$_POST["password"]."'";
            // $postee = "SELECT * FROM users WHERE login='{$_POST["login"]}' AND password='{$_POST["password"]}'";
            
            // Syntaxes n'implémentant pas l'injection SQL
            // $postee = "SELECT * FROM users WHERE login=\"".$_POST["login"]."\" AND password=\"".$_POST["password"]."\"";
              
            // PDO protège contre les injections : impossible d'éxécuter une requête 'multiple' (utiliser les transcations pour cela)
            // Démo : saisir comme valeur dans le champ login : Pierre'; DELETE FROM users--
            // +++ TODO : créer un exemple de connexion sans PDO +++
            // $postee = "SELECT * FROM users WHERE login='".$login."'";

            echo "- Requête postée : <br>\n";
            echo "<pre>\n";
            echo "<code>".$postee."</code>\n";
            echo "</pre>\n";
            ?>
            </div> <!-- .col -->
		  </div> <!-- .row -->        
        <?php
      $result = $oDb->query($postee);

      $user = $result->fetch(PDO::FETCH_OBJ);

      var_dump($user);

      if ($user) 
      {
         $_SESSION["connected"] = TRUE;
         ?>
               <div class="col-12 alert alert-success" role="alert">     
                  Connecté. <a href="moncompte.php" title="Accèdez à votre compte">Mon compte</a>   
                  </div>
               <?php
      } else {
         ?>
                  <div class="col-12 alert alert-danger" role="alert">     
                  Echec de la connection.
                  </div>
               <?php
      }
      ?>
            </div> <!-- .col -->
		</div> <!-- .row -->        
</div> <!-- .container -->
<?php
require "_footer.php";
?>
</body>
</html>