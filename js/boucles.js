// EXERCICE 2 //
var n
for(i=0; i<n; i++) {
    console.log(i)
}

// EXERCICE 3 //
var n1 = parseInt(prompt("Entrez n1"))
var n2 = parseInt(prompt("Entrez n2"))
while(n1 <= n2) {
   n3 = n1 + n2
   console.log("somme = " + n3)
   n1++
}

// EXERCICE 4 //
var n1 = parseInt(prompt("Entrez n1"))
var n2 = parseInt(prompt("Entrez n2"))
while(n1 <= n2) {
    if(n1 == 0 || n2 == 0) {
        break;
    } else {
        n3 = n1 + n2
   console.log("somme = " + n3)
   console.log("moyenne = " + n3/2)
   n1++
    }
}