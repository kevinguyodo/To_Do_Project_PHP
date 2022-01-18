<?php
    // require('../Models/Connection.php');
    require_once '../vendor/autoload.php';
    require_once '../View/login.php';
?>

<?php
    use App\Connection;

    
    $db;

    function login() {
        if(isset($_POST['formlogin'])){
            verifyLogin();
        }
    }

    function verifyLogin() {

        extract($_POST);
        $db = (new Connection())->connect();

        if(!empty($lMail) && !empty($lPassword)){ //condition qui vérifi si les champs sont tous remplis
            $q = $db->prepare("SELECT * FROM Users WHERE Mail = :Mail"); //ici on analyse si le mail existe
            $q->execute(['Mail' => $lmail]); //On exécute la requête
            $result = $q->fetch(); //Permet de créer un tableau 
            
            if($result){ //condition qui permet de savoir si le mail existe déja
                $hashpass = $result['PassWord']; //On verifi ici si le mdp hashé correspond au mdp en clair

                if(password_verify($lpassword, $hashpass)){ //condition qui permet de savoir si le mdp rentré par l'utilisateur est le bon ou non
                    echo "Le mot de passe est correcte, connexion en cours..";
                    header('Location: ../View/board.php');
                    die();

                } else {
                    echo "Le mot de passe est incorrecte, veuillez ressayer.. ";
                }

            } else {
                echo "L'adresse mail n'existe pas";
            }

        } else {
            echo "Veuillez compléter l'ensemble des champs";
        }        
    }  
?>
