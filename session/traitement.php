<?php
require "db.php";

$db = connexionBase();
if(isset($_POST["login"]) && isset($_POST["pass"])) {
    $requete = "SELECT * FROM users WHERE login=? AND password=?";
    $result = $db->prepare($requete);
    $result->execute([$_POST["login"], $_POST["pass"]]);

    $user = $result->fetch();

    if ($user) {
        $_SESSION["connected"] = true;
        $_SESSION["login"] = htmlspecialchars($_POST["login"]);
        $succes = "<p>Vous êtes bien connecté</p>";
        include "compte.php";
    } else {
        $_POST["error"] = "<p>Login ou mot de passe incorrect</p>";
        header("Location: index.php");
        exit;
    }
}