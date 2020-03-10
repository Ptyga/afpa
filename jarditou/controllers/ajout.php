<?php
include("../views/entete.phtml");

require "db.php"; // Inclusion de notre bibliothèque de fonctions
require "fonctions.php";
$db = connexionBase(); // Appel de la fonction de connexion
$categories = categories($db);


include("../views/ajout.phtml");

include("../views/pied.phtml");