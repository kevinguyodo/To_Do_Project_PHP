<?php
    // require('../Models/Connection.php');
    require_once '../vendor/autoload.php';
    require_once '../View/login.php';
?>

<?php
    use App\Connection;

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
            $q->execute(['Mail' => $lMail]); //On exécute la requête
            $result = $q->fetch(); //Permet de créer un tableau 
            
            if($result){ //condition qui permet de savoir si le mail existe déja
                $hashpass = $result['PassWord']; //On verifi ici si le mdp hashé correspond au mdp en clair

                if(password_verify($lPassword, $hashpass)){ //condition qui permet de savoir si le mdp rentré par l'utilisateur est le bon ou non
                    creationSession($db, $lMail);
                    echo "Le mot de passe est correcte, connexion en cours..";
                    header('Location: ../Controllers/board.php');
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

    function creationSession($db, $lMail) {
        session_start();
        $q = $db->prepare("SELECT User_Id, Username FROM Users WHERE Mail = :Mail");
        $q->execute(['Mail' => $lMail]);
        $result = $q->fetch();

        $_SESSION['idUser'] = $result['User_Id'];
        $_SESSION['Username'] = $result['Username'];
        setcookie('sessionCookie', $result['Username'], time()+3600);
    }


?>
