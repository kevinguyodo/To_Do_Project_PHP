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

            <form action="" method="post">
                <div class="form">
                    <input type="text" name="u" placeholder="Username" required="required" />
                    <input type="password" name="p" placeholder="Password" required="required" />
                </div>
                <div class="info">
                    <button type="submit" class="btn btn-primary btn-block btn-large">LOGIN</button>
                </div>

            </form>

            <div class="desc">
                <a href="/Controllers/register.php"><button class="git">Create Account ?</button></a>
            </div>
        </div>
    </header>
</body>

</html>