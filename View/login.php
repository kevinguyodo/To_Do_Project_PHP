<?php

    include '../Controllers/login.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/static/login.css">
    <title>Login - To do list</title>
</head>

<body>
    <header>
        <div class="overlay">
            <h1 class="title">To-do-list</h1>
            <h2 class="desc">Login</h2>

            <?php if(isset($_POST['formlogin'])){
                login();
            }
            ?>

            <form  method="post">
                    <input type = "lmail" name ="lmail" id ="lmail" placeholder="Votre mail" ><br/>
                    <input type = "password" name ="lpassword" id ="lpassword" placeholder="Votre mot de passe" ><br/>

                <div class="info">
                    <button type="submit" name ="formlogin" id = "formlogin" placeholder = "formlogin" class="btn btn-primary btn-block btn-large">LOGIN</button>
                </div>

            </form>

            <div class="desc">
                <a href="/View/register.php"><button class="git">Create Account ?</button></a>
            </div>
        </div>
    </header>
</body>

</html>