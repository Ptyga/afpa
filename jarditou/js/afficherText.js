var nom = prompt("Entrez votre nom");
var prenom = prompt("Entrez votre prénom");
var genre = confirm("Etes-vous un homme ?");
if(genre == true) {
    alert("Bonjour Monsieur " + nom + " " + prenom)
} else {
    alert("Bonjour Madame " + nom + " " + prenom)
}