<?php
    ob_start();

?>

<div class="overlay">
    <h1 class="title">To-do-list</h1>
    <h2 class="desc">Que souhaitez-vous faire ?</h2>

    <div class="button">
        <button class="login">Login</button>
        <button class="register">Register</button>
    </div>
</div>

<?php
    $content = ob_get_clean();
?>

<?php
    ob_start();

?>

<div class="info">
    <h1 class="title">Projet PHP</h1>
    <h2 class="desc">Présenté par :</h2>
    <p>Elouan DUMONT</p>
    <p>Kévin GUYODO</p>
    <p>Yasser YOUSSOUF</p>
    <p>Enzo PINOT</p>
    <a target="_blank" href="https://github.com/kevinguyodo/To_Do_Project_PHP"><button class="git">Accès au GITHUB</button></a>
</div>

<?php
    $footer = ob_get_clean();
?>

<?php
    require "./View/homepage.php"
?>