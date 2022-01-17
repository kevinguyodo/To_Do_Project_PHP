<?php
    // require('../Models/Connection.php');
    require '../vendor/autoload.php';
    require '../View/login.php';
?>

<?php
    include "../Models/Connection.php";
    use App\Connection;
    // $pdo = new Connection();
    $test = new Connection();
    echo $test->connect();
    // if ($pdo->connect() != null) {
    //     echo "Connected";
    // } else {
    //     echo "No Connected";
    // }
        // global $db;

        

        // if(!empty($lmail) && !empty($lpassword)){ //condition qui vérifi si les champs sont tous remplis


        //     $q = $db -> prepare ("SELECT * FROM Users WHERE Mail = :Mail"); //ici on analyse si le mail existe
        //     $q-> execute(['Mail' => $lmail]); //On exécute la requête
        //     $result = $q->fetch(); //Permet de créer un tableau 

        //     if($result == true){ //condition qui permet de savoir si le mail existe déja
        //         $hashpass = $result['PassWord']; //On verifi ici si le mdp hashé correspond au mdp en clair

        //         if(password_verify($lpassword, $hashpass)){ //condition qui permet de savoir si le mdp rentré par l'utilisateur est le bon ou non
        //             echo "Le mot de passe est correcte, connexion en cours..";

        //             header('Location: ../View/home_to_do_list.php');
        //             exit();

        //         }else{

        //             echo "Le mot de passe est incorrecte, veuillez ressayer.. ";
        //         }

        //     }else{
        //         echo "L'adresse mail n'existe pas";
        //     }

        // }else{
        //     echo "Veuillez compléter l'ensemble des champs";
        // }
    
?>
