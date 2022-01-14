<?php
    include '../Models/database.php';
    global $db;
    include '../Controllers/register.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/static/register.css">
    <title>Register - To do list</title>
</head>

<body>
    <header>
        <div class="overlay">
            <h1 class="title">To-do-list</h1>
            <h2 class="desc">Register</h2>

            <?php if(isset($_POST['formsend'])){
        register();
    }
    ?>


            <form  method="post">
                <input type = "username" name = "username" id = "username" placeholder="Votre nom d'utilisateur"><br/>
                <input type = "mail" name ="mail" id ="mail" placeholder="Votre mail" ><br/>
                <input type = "password" name ="password" id ="password" placeholder="Votre mot de passe" ><br/>
                <input type = "password" name ="cpassword" id ="cpassword" placeholder="Confirmez votre mot de passe" ><br/>

                <div class="info">

                    <button type="submit" name = "formsend" id = "formsend" placeholder = "formsend" class="btn btn-primary btn-block btn-large">REGISTER</button>

                </div>

            </form>

            <div class="desc">
                <a href="/Controllers/login.php"><button class="git">Or Sign in ?</button></a>
            </div>

        </div>
    </header>
</body>

</html>