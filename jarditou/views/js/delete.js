document.getElementById("delete").addEventListener('click', function(e) {
    var delete_product = confirm("Voulez-vous vraiment supprimer ce produit ?");

    if(delete_product == false) {
        e.preventDefault();
        window.location="liste.php";
    }    
})