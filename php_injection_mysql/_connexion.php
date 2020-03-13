<?php
/* --------------------------------------------------------
* php_xss/connexion.php
* ---------------------------------------------------------
*/
function connexion() 
{  
   $aOptions = [ PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
               ];
   
   try
   {
      return new PDO('mysql:host=localhost;dbname=afpa_securite;charset=utf8', 'root', '', $aOptions);
   }
   catch (Exception $e)
   {
      echo $e->getCode()." - ".$e->getMessage()." (".__FILE__.":L".__LINE__.")";
      die();
   }
} // -- connexion()