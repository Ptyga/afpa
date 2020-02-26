//          EXERCICE 1      //
//          EXEMPLE 1       //
if(temperature > 38) {
    document.write = "Le patient a de la fièvre"
}


//          EXEMPLE 2       //
if(temperature > 41 && tension > 25) {
    document.write = "Le patient va perdre patience"
}


//          EXEMPLE 3       //
if(!patient) {
    document.write = "Éconduire l'olibrius"
}


//          EXEMPLE 4       //
if(temperature > 42 || (tension < 25 && pouls > 180)) {
    document.write = "Prévenir la famille"
}


//          EXEMPLE 5       //
if(temperature > 40 || tension >= 25) {
    document.write = "Hospitaliser le patient"
}


//          EXEMPLE 6       //
if(patient == 0 && pouls == 0) {
    document.write = "Appeler le curé"
}



//      EXERCICE 2      //
var naissance = prompt("En quelle année êtes-vous né ?");
var date = new Date();
var annee = date.getFullYear();
var calcul = annee - naissance;
if(calcul > 18) {
    echo("Vous avez " + calcul + " ans, vous êtes donc majeur");
} else {
    echo("Vous avez " + calcul + " ans, vous n'êtes donc pas majeur");
}


//      EXERCICE 3      //
var premier = prompt("Entrez un premier nombre");
var second = prompt("Entrez un second nombre");
var operateur = prompt("Entrez un opérateur entre '+' , '-' , '*' , ou '/'");

if(operateur == "+") {
    echo(premier + second)
} else if(operateur == "-") {
    echo(premier - second)
} else if(operateur == "/") {
    if(second == 0) {
        alert("Il est impossible de diviser un nombre par zéro")
    } else {
        echo(premier / second)
    }
} else if(operateur == "*") {
    echo(premier * second)
} else {
    alert("Ceci n'est pas un opérateur de calcul")
}


//      EXERCICE 4      //
var repas = 5;
var participation;

if(celibataire) {
    participation = repas * 20 / 100
} else if (marie) {
    participation = repas * 25 / 100
} else if (empty(enfant)) {
    if(enfant >= 3) {
        participation = repas * 50 / 100
    } else {
        participation = (repas * 10 / 100) * enfant
    }
}
if(salaire < 1200) {
    participation = repas * 10 / 100
}