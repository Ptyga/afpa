<?php


$a = array(
    "19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"),
    "19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""),
    "19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation")
);

/*
        //      EXERCICE 1      //
foreach ($a as $key => $tab) {
    if($key == "19002") {
        for($i=0; $i<count($tab)-1; $i++) {
            if($tab[$i] == "Validation") {
                $semaine = $i+1;
                echo "La validation du groupe 19002 a lieu la " . $semaine . "ème semaine.";
            }
        }
    }
};


        //      EXERCICE 2      //
foreach ($a as $key => $tab) {
    if ($key == "19001") {
        for ($i = 0; $i < count($tab) - 1; $i++) {
            if ($tab[$i] == "Centre") {
                $pos = $i + 1;
            }
        }
        echo "La dernière occurence 'centre' apparaît à la " . $pos . "ème position.<br>";
    }
};

        //      EXERCICE 3      //
$tab = [];
foreach ($a as $key => $value) {
    array_push($tab, $key);
    var_dump($tab);
};

        //      EXERCICE 4      //
$semaine = 0;
foreach ($a as $key => $tab) {
    if ($key == "19003") {
        for ($i = 0; $i < count($tab) - 1; $i++) {
            if ($tab[$i] == "Stage") {
                $semaine++;
            }
        }
        echo "Le stage du groupe 19003 dure " . $semaine . " semaines.";
    }
};
*/