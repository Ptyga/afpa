<?php
/* --------------------------------------------------------
 * php_injection_sql/exemple1_connexion.php
 * --------------------------------------------------------- */
session_start();

$sTitle = "Injection SQL - Sécurité";

require "_header.php";
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 border-bottom pb-3 mb-3">
            <h1>Injection SQL - Sécurité</h1>            
         </div> <!-- .col -->
    </div> <!-- .row -->    
      <div class="row">
        <div class="col-12">                  
            <ul class="list-group list-group-flush">
            	<li class="list-group-item list-group-item-action list-group-item-primary"><a href="exemple1_connexion.php" title="Exemple 1">Exemple 1 : formulaire de connexion</a></li>
            	<li class="list-group-item list-group-item-action list-group-item-primary"><a href="exemple3_prepare.php" title="Exemple 2" class="">Exemple 2 : suppression de données</a></li>            	
            </ul>
        </div> <!-- .col -->
    </div> <!-- .row -->     
</div> <!-- .container -->
<?php
require "_footer.php";
?>
</body>
</html>