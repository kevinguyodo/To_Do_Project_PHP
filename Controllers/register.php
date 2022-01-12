<?php
    ob_start();

?>

<div class="overlay">
    <h1 class="title">To-do-list</h1>
    <h2 class="desc">Register</h2>

    <form action="" method="post">
        <div class="form">
            <input type="text" name="u" placeholder="Username" required="required" />
            <input type="text" name="u" placeholder="Email" required="required" />
            <input type="password" name="p" placeholder="Password" required="required" />
            <input type="password" name="p" placeholder="Confirm password" required="required" />
        </div>
        <div class="info">
            <button type="submit" class="btn btn-primary btn-block btn-large">REGISTER</button>
        </div>
    </form>

    <div class="desc">
        <a href="/Controllers/login.php"><button class="git">Or Sign in ?</button></a>
    </div>

</div>

<?php
    $content = ob_get_clean();
?>

<?php
    require "../View/register.php"
?>