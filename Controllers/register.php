<?php
    require_once '../vendor/autoload.php';
    require_once "../View/register.php"
?>

<?php
    use App\Connection;

    function register(){
        if (isset($_POST['register'])) {
            verifyRegister();
        }
    }

    function verifyRegister() {

        $db = (new Connection())->connect();
        extract($_POST);
    
        if(!empty($Username) && !empty($Mail) && !empty($Password) && !empty($ConfirmPassword)){ //condition qui vérifi si les champs sont tous remplis
    
            if($Password == $ConfirmPassword){ //condition qui vérifi si le mdp ainsi que la confirmation du mpd sont similaire 
                $options = [
                    'cost' => 12,
                ];
                $hashpass = password_hash($Password, PASSWORD_BCRYPT, $options); // permet d'hasher le mdp
    
                $c = $db->prepare("SELECT Mail FROM Users WHERE Mail = :Mail"); //ici on analyse si le mail existe
                $c->execute (['Mail' => $Mail]); //On exécute 
                $result = $c->rowCount(); //On créé une variable qui va repérer ou non si le mail existe déja
    
                if($result == 0){ //on fait une condition, si quand l'utilisateur rempli le formulaire d'inscription et que le mail n'existe pas alors le compte est créé, sinon le compte a déja été créé
                    $q = $db->prepare("INSERT INTO Users(Mail, Password, Username) VALUES (:Mail, :Password, :Username) ");
                    $q->execute([
                        'Mail' => $Mail,
                        'Password' => $hashpass,
                        'Username' => $Username
                    ]);
    
                    echo "Le compte a été créé";

                    header("Location: ../Controllers/login.php");
                    die();
    
                }else{
                    echo "L'adresse mail entrée existe déja";
                }
    
            }else{
                echo "Le mot de passe n'est pas le même";
            }
    
        } else {
            echo "Les champs ne sont pas tous remplis";
        }
    }

    
?>