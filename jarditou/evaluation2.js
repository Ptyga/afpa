//      EXERCICE 7       //
console.log("test");
document.getElementById("validate").addEventListener("click", function() {
    var errors = []
    var nom = document.getElementById("nom").value
    var prenom = document.getElementById("prenom").value
    var question = document.getElementById("question").value
    
    if(nom.trim().length === 0) {
        var error_nom = "<p>Vous devez renseigner votre nom</p>"
        errors.push(error_nom)
    }
    if(prenom.trim().length === 0) {
        var error_prenom = "<p>Vous devez renseigner votre prenom</p>"
        errors.push(error_prenom)
    }
    if(question.trim().length === 0) {
        var error_question = "<p>Veuillez renseigner votre demande dans la zone de texte</p>"
        errors.push(error_question)
    }
    if(errors.length != 0) {
        document.getElementById("nom").style.outline = "1px solid red"
        document.getElementById("prenom").style.outline = "1px solid red"
        document.getElementById("question").style.outline = "1px solid red"

        document.getElementById("error_nom").innerHTML = error_nom
        document.getElementById("error_prenom").innerHTML = error_prenom
        document.getElementById("error_question").innerHTML = error_question


        document.getElementById("error_nom").classList.remove("d-none")
        document.getElementById("error_prenom").classList.remove("d-none")
        document.getElementById("error_question").classList.remove("d-none")
    }
});