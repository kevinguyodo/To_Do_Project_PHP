<?php
    require '../View/task.php';

    function disconnect() {
        // Récupère requête POST avec le nom du boutton
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: ../index.php");
            die();
        } 
    }
?>