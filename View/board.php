<?php 
    require_once "./cookieSession.php";
    session_start();

    $username = $_SESSION['Username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/static/board.css">
    <link href="../View/static/all.css" rel="stylesheet">
    <title>Board - To do list</title>
</head>

<body>

    <header>
        <div class="overlay">
            <div class="info_user">
                <h3 class="name_user"><?php echo $username?></h3>
                <div class="icon">
                    <i class="fas fa-user fa-2x"></i>
                </div>
                <div class="icon">
                    <form method="post">
                        <!-- Boutton déconnexion -->
                        <button type="submit" class="logout" name="logout"><i
                                class="fas fa-sign-out-alt fa-2x"></i></button>
                    </form>
                </div>
            </div>
            <h1 class="title">To-do-list</h1>
            <h2 class="desc">Bienvenue dans votre board</h2>
            <form method="post">
                <div class="form">
                    <input class="but" type="text" name="nameBoard" placeholder="To-do..." required="required" />
                </div>
                <div class="info">
                    <button type="submit" name="createBoard" class="btn btn-primary btn-block btn-large">Add</button>
                </div>
            </form>
        </div>
    </header>
    <div class="board">
        <div class="wrapper">

            <?=getBoards($username)?>

        </div>
    </div>
    <?= creationBoard($username) ?>
    <?= disconnect() ?>
    <?= backToMenu() ?>
</body>

</html>