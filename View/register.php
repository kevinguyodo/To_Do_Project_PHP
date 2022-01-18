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

            <form method="post">
                <div class="form">
                    <input type="text" name="Username" placeholder="Username" required="required" />
                    <input type="text" name="Mail" placeholder="Email" required="required" />
                    <input type="password" name="Password" placeholder="Password" required="required" />
                    <input type="password" name="ConfirmPassword" placeholder="Confirm password" required="required" />
                </div>
                <div class="info">
                    <button type="submit" name="register" class="btn btn-primary btn-block btn-large">REGISTER</button>
                </div>
            </form>

            <div class="desc">
                <a href="/Controllers/login.php"><button class="git">Or Sign in ?</button></a>
            </div>

        </div>
        <?=register()?>
    </header>
</body>

</html>