<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenue sur votre espace <?php echo $_SESSION["login"]; ?></h1>

    <?php if(isset($success)) {
        echo $success;
    } ?>
</body>
</html>