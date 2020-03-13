<?php
/*
 * --------------------------------------------------------
 * php_injection_sql/exemple3_post.php
 * ---------------------------------------------------------
 */
session_start();
$sTitle = "Injection SQL - Sécurité";
require "_header.php";
require "_connexion.php";
$oDb = connexion();

$login = $_POST['login'];
$password = $_POST['password'];
?>
<body>
<div class="container">
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
            // Solution 1 : marqueurs 'points d'interrogation'
            $postee = "SELECT * FROM users WHERE login=? AND password=?";

            // Solution 2 : marqueurs avec ':'
            $postee = "SELECT * FROM users WHERE login=:login AND password=:password";
            
            echo "- Requête postée : <br>\n";
            echo "<pre>\n";
            echo "<code>".$postee."</code>\n";
            echo "</pre>\n";
            ?>
            </div> <!-- .col -->
		  </div> <!-- .row -->        
        <?php
        $sth = $oDb->prepare($postee);
        
        // Solution 1 : marqueurs 'points d'interogation'
        //$sth->execute(array($login, $password));
                
        // Solution 2 : marqueurs avec ':' + binValue() ou bindParam()
        $sth->bindValue(':login', $login);
        $sth->bindValue(':password', $password);
        $sth->execute();
        
        $user = $sth->fetch();
               
        var_dump($user);

      if ($user) 
      {
         $_SESSION["connected"] = TRUE;
         ?>
               <div class="col-12  alert alert-success" role="alert">     
                  Connecté. <a href="moncompte.php" title="Accèdez à votre compte">Mon compte</a>   
                  </div>
               <?php
      } 
      else 
      {
      ?>
                  <div class="col-12 alert alert-danger" role="alert">     
                  Echec de la connexion à votre compte.
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