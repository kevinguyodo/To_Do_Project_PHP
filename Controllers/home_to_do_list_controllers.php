<?php

    function addition() {
        echo 4+2;
    }

    function addToDoList() {
        if (isset($_POST["add_to_do"])){
            echo '<p>Vous avez cliqué sur le bouton</p>';
        }
    }
    // if (isset($_POST["add_to_do"])){
    //     echo '<p>Vous avez cliqué sur le bouton</p>';
    // }
?>

<?php
    $content = ob_get_clean();
    $test="Hello World";
?>