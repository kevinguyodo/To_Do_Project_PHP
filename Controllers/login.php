<?php
    ob_start();

?>

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

</div>

<?php
    $content = ob_get_clean();
?>

<?php
    require "../View/login.php"
?>