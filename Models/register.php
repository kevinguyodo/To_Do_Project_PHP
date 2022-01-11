<?php 

if(isset($_POST['formsend'])){

    extract($_POST);

    if(!empty($password) && !empty($cpassword) && !empty($mail)){ //condition qui vérifi si les champs sont tous remplis

        if($password == $cpassword){ //condition qui vérifi si le mdp ainsi que la confirmation du mpd sont similaire 
            $options = [
                'cost' => 12,
            ];
            $hashpass =  password_hash($password, PASSWORD_BCRYPT, $options); // permet d'hasheer le mdp

            $c = $db->prepare("SELECT mail FROM Users WHERE mail = :mail"); //ici on analyse si le mail existe
            $c->execute (['mail' => $mail]); //On exécute 
            $result = $c-> rowCount(); //On créé une variable qui va repérer ou non si le mail existe déja

            if($result == 0){ //on fait une condition, si quand l'utilisateur rempli le formulaire d'inscription et que le mail n'existe pas alors le compte est créé, sinon le compte a déja été créé
                $q = $db-> prepare("INSERT INTO Users(mail, password) VALUES (:mail, :password) ");
                $q->execute([
                    'mail' => $mail,
                    'password' => $hashpass
                ]);

                echo "Le compte a été créé";

            }else{
                echo "L'adresse mail entrée existe déja";
            }

        }else{
            echo "Le mot de passe n'est pas le même";
        }

    }else{
        echo "Les champs ne sont pas tous remplis";
    }

        
}

?>