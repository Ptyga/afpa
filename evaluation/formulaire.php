<?php
if(date('Y') - date('Y', strtotime($_POST["date"])) < 18) {
    echo "<p>Vous devez être majeur</p>";
} else {
    echo "<p>Vous avez " . date('Y') - date('Y', strtotime($_POST["date"])) . " ans, c'est à dire moins de 18 ans</p>";
}

if (isset($_POST["nom"]) && empty($_POST["nom"])) 
{
    echo "<p>Vous devez renseigner votre nom</p>";
}  else {
    echo "<p>" . $_POST["nom"] . "</p>";
}

if (isset($_POST["prenom"]) && empty($_POST["prenom"])) 
{
    echo "<p>Vous devez renseigner votre prenom</p>";
}  else {
    echo "<p>" . $_POST["prenom"] . "</p>";
}

if (isset($_POST["question"]) && empty($_POST["question"])) 
{
    echo "<p>Veuillez renseigner votre demande dans la zone de texte</p>";
}  else {
    echo $_POST["question"];
}

if (isset($_POST["date"]) && empty($_POST["date"])) 
{
    echo "<p>Veuillez renseigner votre date de naissance</p>";
}  else {
    echo $_POST["date"];
}

if (isset($_POST["cp"]) && empty($_POST["cp"]) || strlen($_POST["cp"]) < 5) 
{
    echo "<p>Veuillez renseigner un code postale à 5 chiffres</p>";
}   else {
    echo $_POST["cp"];
}

if (isset($_POST["email"]) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']) == false)
{
    echo "<p>Veuillez renseigner une adresse Email valide</p>";
}  else {
    echo $_POST["email"];
}

if (isset($_POST["conditions"]) && empty($_POST["conditions"])) 
{
    echo "<p>Vous devez accepter les conditions d'utilisation</p>";
}   else {
    echo "Vous avez accepté les conditions d'utilisation";
}

if (isset($_POST["sexe"]) && empty($_POST["sexe"])) 
{
    echo "<p>Veuillez choisir l'une des cases à cocher</p>";
}   else {
    echo $_POST["sexe"];
}