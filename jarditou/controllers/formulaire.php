<?php
include("../views/entete.phtml");

if(isset($_POST) && !empty($_POST)) {
    
    $errors = [];

    if (!isset($_POST["nom"]) || empty($_POST["nom"])) {
        $error1 = "<p>Vous devez renseigner votre nom</p>";
        $errors["nom"] = $error1;
    }
    if (!isset($_POST["prenom"]) || empty($_POST["prenom"])) {
        $error2 = "<p>Vous devez renseigner votre prenom</p>";
        $errors["prenom"] = $error2;
    }
    if (!isset($_POST["sexe"]) || $_POST["sexe"] == null) {
        $error3 = "<p>Veuillez nous dire si vous êtes un homme ou une femme</p>";
        $errors["sexe"] = $error3;
    }
    if (!isset($_POST["date"]) || empty($_POST["date"])) {
        $error4 = "<p>Veuillez renseigner votre date de naissance</p>";
        $errors["date"] = $error4;
    } else {
        $year = explode("-", $_POST["date"]);
        $thisYear = date('Y');
        $age = $thisYear - intval($year[0]);
        
        if ($age < 18) {
            $error4 = "<p>Vous devez être majeur</p>";
            $errors["date"] = $error4;
        }
    }
    
    if (!isset($_POST["cp"]) || strlen($_POST["cp"]) < 5) {
        $error5 = "<p>Veuillez renseigner un code postale à 5 chiffres</p>";
        $errors["cp"] = $error5;
    }
    if (!isset($_POST["email"]) || preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']) == false) {
        $error6 = "<p>Veuillez renseigner une adresse Email valide</p>";
        $errors["email"] = $error6;
    }
    if (!isset($_POST["question"]) || empty($_POST["question"])) {
        $error7 = "<p>Veuillez renseigner votre demande dans la zone de texte</p>";
        $errors["question"] = $error7;
    }
    if (!isset($_POST["conditions"]) || empty($_POST["conditions"])) {
        $error8 = "<p>Vous devez accepter les conditions d'utilisation</p>";
        $errors["conditions"] = $error8;
    }
    if (count($errors) == 0) {
        $_POST["valide"] = "<div class='text-center font-weight-bolder text-success text-center'><p> Votre formulaire a bien été envoyé =) </p></div>";
    } else {
        $_POST["errors"] = $errors;
    }
} else {
    header('Location: contact.php');
}

include("../views/contact.phtml");
include("../views/pied.phtml");