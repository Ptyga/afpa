<?php

function calculator($operation) {
$number1 = 5;
$number2 = 10;

    if($operation == "addition") {
        $result = $number1 + $number2;
        echo $result . "<br>";
    }
    if ($operation == "soustraction") {
        $result = $number1 - $number2;
        echo $result . "<br>";
    }
    if ($operation == "division") {
        $result = $number1 / $number2;
        echo $result . "<br>";
    }
    if ($operation == "multiplication") {
        $result = $number1 * $number2;
        echo $result . "<br>";
    }
};

calculator("addition");
calculator("soustraction");
calculator("division");
calculator("multiplication");