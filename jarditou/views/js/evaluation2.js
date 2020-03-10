//      EXERCICE 7       //

var nom = document.getElementById("nom")
var prenom = document.getElementById("prenom")
var question = document.getElementById("question")
var naissance = document.getElementById("date")
var email = document.getElementById("email")
var cp = document.getElementById("cp")
var condtions = document.getElementById("conditions")
var sexe = document.getElementById("sexe")
var errors = []
var radio1 = document.getElementById("feminin")
var radio2 = document.getElementById("masculin")

var regex = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/
function verif_nom() {
    if (nom.value.trim().length === 0) {
        var error_nom = "<p>Vous devez renseigner votre nom</p>"
        errors.push(error_nom)
        nom.style.outline = "1px solid red"
        document.getElementById("error_nom").innerHTML = error_nom
        document.getElementById("error_nom").classList.remove("d-none")
    } else {
        nom.style.outline = "1px solid green"
        document.getElementById("error_nom").innerHTML = ""
        document.getElementById("error_nom").classList.add("d-none")
    }
}

function verif_prenom() {
    if (prenom.value.trim().length === 0) {
        var error_prenom = "<p>Vous devez renseigner votre prenom</p>"
        errors.push(error_prenom)
        prenom.style.outline = "1px solid red"
        document.getElementById("error_prenom").innerHTML = error_prenom
        document.getElementById("error_prenom").classList.remove("d-none")
    } else {
        prenom.style.outline = "1px solid green"
        document.getElementById("error_prenom").innerHTML = ""
        document.getElementById("error_prenom").classList.add("d-none")
    }
}

function verif_question() {
    if (question.value.trim().length === 0) {
        var error_question = "<p>Veuillez renseigner votre demande dans la zone de texte</p>"
        errors.push(error_question)
        question.style.outline = "1px solid red"
        document.getElementById("error_question").innerHTML = error_question
        document.getElementById("error_question").classList.remove("d-none")
    } else {
        question.style.outline = "1px solid green"
        document.getElementById("error_question").innerHTML = ""
        document.getElementById("error_question").classList.add("d-none")
    }
}

function verif_sexe() {
    if (!radio1.checked && !radio2.checked) {
        var error_sexe = "<p>Veuillez choisir l'une des cases à cocher</p>"
        errors.push(error_sexe)
        sexe.style.outline = "1px solid red"
        document.getElementById("error_sexe").innerHTML = error_sexe
        document.getElementById("error_sexe").classList.remove("d-none")
    } else {
        sexe.style.outline = "1px solid green"
        document.getElementById("error_sexe").innerHTML = ""
        document.getElementById("error_sexe").classList.add("d-none")
    }
}

function verif_date() {
    if (!naissance.value) {
        var error_date = "<p>Veuillez renseigner votre date de naissance</p>"
        errors.push(error_date)
        naissance.style.outline = "1px solid red"
        document.getElementById("error_date").innerHTML = error_date
        document.getElementById("error_date").classList.remove("d-none")
    } else {
        var date1 = new Date()
        var annee = date1.getFullYear()
        var date2 = new Date(naissance.value)
        var moins_annee = date2.getFullYear()
        var majorite = annee - moins_annee
        document.getElementById("error_date").classList.add("d-none")
        if (majorite < 18) {
            var error_age = "<p>Vous devez être majeur</p>"
            errors.push(error_age)
            naissance.style.outline = "1px solid red"
            document.getElementById("error_date").innerHTML = error_age
            document.getElementById("error_date").classList.remove("d-none")
        } else {
            naissance.style.outline = "1px solid green"
            document.getElementById("error_date").classList.add("d-none")
        }
    }
}

function verif_email() {
    if (regex.test(email.value) == false) {
        var error_email = "<p>Veuillez renseigner une adresse Email valide</p>"
        errors.push(error_email)
        email.style.outline = "1px solid red"
        document.getElementById("error_email").innerHTML = error_email
        document.getElementById("error_email").classList.remove("d-none")
    } else {
        email.style.outline = "1px solid green"
        document.getElementById("error_email").innerHTML = ""
        document.getElementById("error_email").classList.add("d-none")
    }
}

function verif_cp() {
    if (cp.value.length < 5) {
        var error_cp = "<p>Veuillez renseigner un code postale à 5 chiffres</p>"
        errors.push(error_email)
        cp.style.outline = "1px solid red"
        document.getElementById("error_cp").innerHTML = error_cp
        document.getElementById("error_cp").classList.remove("d-none")
    } else {
        cp.style.outline = "1px solid green"
        document.getElementById("error_cp").innerHTML = ""
        document.getElementById("error_cp").classList.add("d-none")
    }
}

function verif_conditions() {
    if (conditions.checked) {
        conditions.style.outline = "1px solid green"
        document.getElementById("error_conditions").innerHTML = ""
        document.getElementById("error_cp").classList.add("d-none")
    } else {

        var error_conditions = "<p>Vous devez accepter les conditions d'utilisation</p>"
        errors.push(error_conditions)
        conditions.style.outline = "1px solid red"
        document.getElementById("error_conditions").innerHTML = error_conditions
        document.getElementById("error_conditions").classList.remove("d-none")
    }
}

function confirm_send() {
    if (errors.length === 0) {
        document.getElementById("send").style.outline = "1px solid forestgreen"
        document.getElementById("send").innerHTML = "<p>Votre formulaire a bien été envoyé !</p>"
        document.getElementById("send").classList.remove("d-none")
    }
}
function form_contact() {
    verif_nom();
    verif_prenom();
    verif_question();
    verif_sexe();
    verif_date();
    verif_email();
    verif_cp();
    verif_conditions();
    confirm_send();
}
document.getElementById("form").addEventListener('submit', function (e) {
    e.preventDefault();
    form_contact();
})
nom.addEventListener('blur', verif_nom)
prenom.addEventListener('blur', verif_prenom)
question.addEventListener('blur', verif_question)
naissance.addEventListener('blur', verif_date)
email.addEventListener('blur', verif_email)
cp.addEventListener('blur', verif_cp)
condtions.addEventListener('blur', verif_conditions)
sexe.addEventListener('blur', verif_sexe)
