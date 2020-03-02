//      EXERCICE 7       //
/*
document.getElementById("form").addEventListener('click', function () {
    var errors = []
    var nom = document.getElementById("nom").value
    var prenom = document.getElementById("prenom").value
    var question = document.getElementById("question").value
    var radio1 = document.getElementById("feminin")
    var radio2 = document.getElementById("masculin")
    var naissance = document.getElementById("date").value
    var email = document.getElementById("email").value
    var cp = document.getElementById("cp").value
    var condtions = document.getElementById("conditions").value
    var date1 = new Date()
    var date2 = new Date(naissance)
    console.log(naissance)
    var majorite = date1.getFullYear() - date2.getFullYear()
    var regex = /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/
    
    if(nom.trim().length === 0) {
        var error_nom = "<p>Vous devez renseigner votre nom</p>"
        errors.push(error_nom)
        document.getElementById("nom").style.outline = "1px solid red"
        document.getElementById("error_nom").innerHTML = error_nom
        document.getElementById("error_nom").classList.remove("d-none")
    }
    if(prenom.trim().length === 0) {
        var error_prenom = "<p>Vous devez renseigner votre prenom</p>"
        errors.push(error_prenom)
        document.getElementById("prenom").style.outline = "1px solid red"
        document.getElementById("error_prenom").innerHTML = error_prenom
        document.getElementById("error_prenom").classList.remove("d-none")
    }
    if(question.trim().length === 0) {
        var error_question = "<p>Veuillez renseigner votre demande dans la zone de texte</p>"
        errors.push(error_question)
        document.getElementById("question").style.outline = "1px solid red"
        document.getElementById("error_question").innerHTML = error_question
        document.getElementById("error_question").classList.remove("d-none")
    }
    if(!radio1.checked && !radio2.checked) {
        var error_sexe = "<p>Veuillez choisir l'une des cases à cocher</p>"
        errors.push(error_sexe)
        document.getElementById("sexe").style.outline = "1px solid red"
        document.getElementById("error_sexe").innerHTML = error_sexe
        document.getElementById("error_sexe").classList.remove("d-none")
    }
    if(naissance.trim().length === 0) {
        var error_date = "<p>Veuillez renseigner votre date de naissance</p>"
        errors.push(error_date)
        document.getElementById("date").style.outline = "1px solid red"
        document.getElementById("error_date").innerHTML = error_date
        document.getElementById("error_date").classList.remove("d-none")
    }
    if(majorite < 18) {
        var error_age = "<p>Vous devez être majeur</p>"
        errors.push(error_age)
        document.getElementById("date").style.outline = "1px solid red"
        document.getElementById("error_age").innerHTML = error_age
        document.getElementById("error_date").classList.remove("d-none")
    }
    if(regex.test(email) == false) {
        var error_email = "<p>Veuillez renseigner une adresse Email valide</p>"
        errors.push(error_email)
        document.getElementById("email").style.outline = "1px solid red"
        document.getElementById("error_email").innerHTML = error_email
        document.getElementById("error_email").classList.remove("d-none")
    }
    if(cp.length < 5) {
        var error_cp = "<p>Veuillez renseigner un code postale à 5 chiffres</p>"
        errors.push(error_email)
        document.getElementById("cp").style.outline = "1px solid red"
        document.getElementById("error_cp").innerHTML = error_cp
        document.getElementById("error_cp").classList.remove("d-none")
    }
    if(!conditions.checked) {
        var error_conditions = "<p>Vous devez accepter les conditions d'utilisation</p>"
        errors.push(error_conditions)
        document.getElementById("conditions").style.outline = "1px solid red"
        document.getElementById("error_conditions").innerHTML = error_conditions
        document.getElementById("error_conditions").classList.remove("d-none")
    }
    // console.log(errors.length)
    if(errors.length === 0) {
        console.log(errors.length)
        document.getElementById("send").style.outline = "1px solid forestgreen"
        document.getElementById("send").innerHTML = "<p>Votre formulaire a bien été envoyé !</p>"
        document.getElementById("send").classList.remove("d-none")
    }
})*/