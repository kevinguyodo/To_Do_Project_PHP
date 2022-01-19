<?php

function disconnect() {
    // Récupère requête POST avec le nom du boutton
    if (isset($_POST['logout'])) {
        $_SESSION = array();
        session_destroy();
        if (isset($_COOKIE['sessionCookie'])) {
            unset($_COOKIE['sessionCookie']);
            setcookie('sessionCookie', '', time() - 3600); // empty value and old timestamp
        }
        header("Location: ../index.php");
        die();
    } 
}

function backToMenu() {
    if (!isset($_COOKIE['sessionCookie'])) {
        header("Location: ../index.php");
        die();
    }
}

?>