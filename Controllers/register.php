<?php 

include '../Models/database.php';


function register(){
    global $db;


        extract($_POST);
    
        if(!empty($password) && !empty($cpassword) && !empty($mail) && !empty($username)){ //condition qui vérifi si les champs sont tous remplis
    
            if($password == $cpassword){ //condition qui vérifi si le mdp ainsi que la confirmation du mpd sont similaire 
                $options = [
                    'cost' => 12,
                ];
                $hashpass =  password_hash($password, PASSWORD_BCRYPT, $options); // permet d'hasher le mdp

                $c = $db->prepare("SELECT Mail FROM Users WHERE Mail = :Mail"); //ici on analyse si le mail existe
                $c->execute (['Mail' => $mail]); //On exécute 
                $result = $c-> rowCount(); //On créé une variable qui va repérer ou non si le mail existe déja
    
                if($result == 0){ //on fait une condition, si quand l'utilisateur rempli le formulaire d'inscription et que le mail n'existe pas alors le compte est créé, sinon le compte a déja été créé
                    $q = $db-> prepare("INSERT INTO Users(Mail, PassWord, Username) VALUES (:Mail, :PassWord, :Username) ");
                    $q->execute([
                        'Mail' => $mail,
                        'PassWord' => $hashpass,
                        'Username' => $username
                    ]);

                    header('Location: ../View/login.php');
                    exit();
    
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