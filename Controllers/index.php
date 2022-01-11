<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php project</title>
</head>
<body>

    <?php include '../Models/database.php'; //on appelle la base de donnée
        global $db;
    ?>

    <h1>LOGIN</h1>

    <form  method="post">
        <input type = "lmail" name ="lmail" id ="lmail" placeholder="Votre mail" ><br/>
        <input type = "password" name ="lpassword" id ="lpassword" placeholder="Votre mot de passe" ><br/>
        <input type = "submit" name ="formlogin" id ="formlogin" placeholder="formlogin" value ="OK">

    </form>

    <?php include '../Models/login.php'; ?>

    <h1>REGISTER</h1>

    <form  method="post">
        <input type = "mail" name ="mail" id ="mail" placeholder="Votre mail" ><br/>
        <input type = "password" name ="password" id ="password" placeholder="Votre mot de passe" ><br/>
        <input type = "password" name ="cpassword" id ="cpassword" placeholder="Confirmez votre mot de passe" ><br/>
        <input type = "submit" name ="formsend" id ="formsend" placeholder="formsend" value ="OK">

    </form>

    <?php include '../Models/register.php'; ?>
    
</body>
</html>