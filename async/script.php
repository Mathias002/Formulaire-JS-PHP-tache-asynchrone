<?php

    //echo json_encode($_POST);

    $succes = 0;
    $message = "Error";


    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['mdp'])){

        $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $mdp = SHA1($_POST['mdp']); // SHA1 = cryptage

        if(strlen($pseudo) < 10 ) {

            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

                //ajout de l'uttilisateur dans la base de données
                $succes = 1;
                $message = "Votre compte a bien été créé";  

            }else{
                $message = "Votre email n'est pas valide";
            }

        }else{
            $message = "Votre pseudo doit contenir au moins 10 caractères";
        }

    }else{
        $message = "Veuillez remplir tous les champs";
    }


    $resultat = ["succes" => $succes, "message" => $message];
    echo json_encode($resultat);
        
    

?>