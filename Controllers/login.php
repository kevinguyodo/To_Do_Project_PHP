<?php

function login(){

    include '../Models/database.php';
    global $db;

        extract($_POST);

        if(!empty($lmail) && !empty($lpassword)){ //condition qui vérifi si les champs sont tous remplis

            $q = $db -> prepare ("SELECT * FROM Users WHERE mail = :mail"); //ici on analyse si le mail existe
            $q-> execute(['mail' => $lmail]); //On exécute la requête
            $result = $q->fetch(); //Permet de créer un tableau 

            if($result == true){ //condition qui permet de savoir si le mail existe déja
                $hashpass = $result['password']; //On verifi ici si le mdp hashé correspond au mdp en clair

                if(password_verify($lpassword, $hashpass)){ //condition qui permet de savoir si le mdp rentré par l'utilisateur est le bon ou non
                    echo "Le mot de passe est correcte, connexion en cours..";

                }else{

                    echo "Le mot de passe est incorrecte, veuillez ressayer.. ";
                }

            }else{
                echo "L'adresse mail n'existe pas";
            }

        }else{
            echo "Veuillez compléter l'ensemble des champs";
        }

}
    
?>