<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <table class="table table-bordered text-center">
        <?php
        // $NbrLigne : le nombre de lignes
        $NbrLigne = 12;
        // -------------------------------
        ?>
        <thead>
            <tr>
                <th scope="col"></th>
                <?php
                // ENTÊTE pour chaque colonne
                for ($j = 0; $j <= $NbrLigne; $j++) {
                ?>
                    <th scope="col"><?php echo $j; ?></th>
                <?php
                } // end for
                ?>
            </tr>
        </thead>

        <tbody>
            <?php
            // pour chaque ligne
            for ($i = 0; $i <= $NbrLigne; $i++) {
            ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <?php
                    // pour chaque colonne (de la ligne)
                    for ($j = 0; $j <= $NbrLigne; $j++) {
                        $k = $i * $j;
                    ?>
                        <td><?php echo $k; // CONTENU de la CELLULE i x j 
                            ?></td>
                    <?php
                    } // end for
                    ?>
                </tr>
            <?php
            } // end for
            ?>
        </tbody>
    </table>
</body>

</html>