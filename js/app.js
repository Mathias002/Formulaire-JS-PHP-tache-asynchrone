document.getElementById("inscription").addEventListener("submit", function(e) 
{
    e.preventDefault();

    var data = new FormData(this); //contien les donnees du formulaire

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var resultat = this.response;
            if (resultat.success){
                console.log("utilisateur inscrit !");
            } else {
                alert(resultat.message);
            }
        }else if (this.readyState == 4) {
            alert("Une erreur est survenue...") ;
        }
        
    };

    // Envoie des données du formulaire vers le fichier php 

    xhr.open("POST", "async/script.php", true);
    xhr.responseType = "json";
    xhr.send(data); //valeur des champs à envoyer au php

    return false;
});

