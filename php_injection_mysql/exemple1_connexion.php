<?php
/* --------------------------------------------------------
 * php_injection_sql/exemple1_connexion.php
 * --------------------------------------------------------- */
session_start();

$sTitle = "Injection SQL - Sécurité";

require "_header.php";

// Supprime la session créée dans le fichier 'exemple1_post.php'
if (isset($_SESSION["connected"]))
{
   unset($_SESSION["connected"]);
   session_destroy();
} 
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
            <h1>Injection SQL - Sécurité &gt; Formulaire de connexion</h1>            
         </div> <!-- .col -->
    </div> <!-- .row -->    
      <div class="row">
        <div class="col-12">                            
            <form action="exemple1_post.php" method="post">                                             
                <div class="form-group">
                   <label for="login">Login</label> 
                   <input type="text" name="login" id="login" value="' or '1=1" class="form-control">                       				   
               </div>                
               <div class="form-group">
                   <label for="password">Mot de passe</label> 
                   <input type="text" name="password" id="password" value="' or '1=1" class="form-control">                                  
               </div>             
                                        
               <div class="form-group">
                   <input type="submit" value="Connexion" class="btn btn-primary">
               </div>    
            </form>            
        </div> <!-- .col -->
    </div> <!-- .row -->  
    <div class="row border-top pb-3 mt-3">
       <div class="col-12">  
     		<a href="#" id="reinit" title="Réinitialiser les valeurs">Réinitialiser les valeurs</a>	
       </div> 
	</div>           
</div> <!-- .container -->
<?php
require "_footer.php";
?>
<script>
$(document).ready(function() 
{	
	$("#reinit").click(function(e) 
	{
		e.preventDefault();
        var sValeur = "' or '1=1";
		$("#login").val(sValeur);
		$("#password").val(sValeur);
	});
});
</script>
</body>
</html>