//      EXERCICE 1      //
function exercice1() {
    var pu = document.getElementById('pu').value
    var qtecom = document.getElementById('qtecom').value
    var tot = pu * qtecom
    var port
    var pap
    var rem
    console.log(tot)
    if(tot >= 100 && tot <= 200) {
        rem = tot * 5 / 100
    } else if(tot > 200) {
        rem = tot * 10 / 100
    } else {
        rem = 0
    }
    if(tot > 500) {
        port = 0
    } else {
        port = tot * 2 / 100
        if(port < 6) {
            port = 6
        }
    }
    pap = tot - rem + port
    console.log(pap)
    document.getElementById("exo1").innerHTML = "<p>Le prix à payer est de " + pap + " €.</p>"
}
document.getElementById("button1").addEventListener("click", exercice1)
document.getElementById("button_1").addEventListener("click", function() {
    document.getElementById("exo1").innerHTML = ""
    document.getElementById('pu').value = ""
    qtecom = document.getElementById('qtecom').value = ""
})


//      EXERCICE 2       //
function exercice2() {
    var n = document.getElementById('n').value
    var somme = 0
    var i = 1
    while(i<=n) {
        somme += i
        console.log(somme)
        document.getElementById('exo2').innerHTML += "<p>Voici la somme des "+ i +" premiers entiers : " + somme +"</p><br>"
        i++
    }
}
document.getElementById("button2").addEventListener("click", exercice2)
document.getElementById("button_2").addEventListener("click", function() {
    document.getElementById("exo2").innerHTML = ""
    document.getElementById('n').value = ""
})


//      EXERCICE 3      //
function exercice3() {
    var tableau = []
    var m = document.getElementById('m').value

        while(m !== 0) {
            tableau.push(m)
            console.log(tableau)
            min = Math.min(...tableau)
            console.log(min)
            max = Math.max(...tableau)
            console.log(max)
            document.getElementById('exo3').innerHTML = "<p>"+ tableau +"</p><p>Le minimum est le nombre "+ min +" et le maximum est le nombre "+ max +"</p>"
            m = parseInt(prompt("Entrez un nombre"))
        }
}
document.getElementById("button3").addEventListener("click", exercice3)
document.getElementById("button_3").addEventListener("click", function() {
    tableau = []
    document.getElementById("exo3").innerHTML = ""
    document.getElementById('m').value = ""
})


//      EXERCICE 4      //
function exercice4() {
    var age = document.getElementById('age').value
    var petit = []
    var moyen = []
    var grand = []
    while(age >= 0) {
        if(age < 20) {
            petit.push(age)
        } else if(age >= 20 && age <= 40) {
            moyen.push(age)
        } else if(age > 40 && age < 100) {
            grand.push(age)
        } else if(age >= 100) {
            grand.push(age)
            break;
        }
        age = prompt("Quel est votre âge ?")
    }
    document.getElementById('exo4').innerHTML = "<p>Le nombre de personnes ayant strictement moins de 20 ans est de " + petit.length +
                                                "</p> <p>Le nombre de personnes ayant strictement plus de 40 ans est de " + grand.length +
                                                "</p> <p>Le nombre de personnes ayant entre 20 ans et 40 ans est de " + moyen.length +"</p>"
}
document.getElementById("button4").addEventListener("click", exercice4)
document.getElementById("button_4").addEventListener("click", function() {
    petit = []
    moyen = []
    grand = []
    document.getElementById("exo4").innerHTML = ""
    document.getElementById('age').value = ""
})


//      EXERCICE 5      //
function exercice5() {
var table = document.getElementById('table').value

    function tableMultiplication (table) {
        for(i=0;i<=table;i++) {
            result = i * table
            document.getElementById("multiple").innerHTML += "<tr><td>" + i + "</td><td>X</td><td>" + table + "</td><td>=</td><td>" + result + "</td></tr>"
            console.log(i + " X " + table + " = " + result)
        }
    }
    tableMultiplication(table)
}
document.getElementById("button5").addEventListener("click", exercice5)
document.getElementById("button_5").addEventListener("click", function() {
    document.getElementById('table').value = ""
    document.getElementById("multiple").innerHTML = ""
})


//      EXERCICE 6      //
function exercice6() {
    var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
    var prenom = document.getElementById('name').value
    var i = tab.indexOf(prenom)
    if(i!=-1) {
        tab.splice(i, 1)
    } else {
        tab.push(prenom)
    }
    console.log(tab)
    document.getElementById('exo6').innerHTML = "<p>Voici votre nouveau tableau : " + tab + "</p>"
}
document.getElementById("button6").addEventListener("click", exercice6)
document.getElementById("button_6").addEventListener("click", function() {
    document.getElementById('name').value = ""
    document.getElementById("exo6").innerHTML = ""
})