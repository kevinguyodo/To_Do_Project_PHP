<?php
    ob_start();

    function addition() {
        echo 4+2;
    }
?>

<?php
    $content = ob_get_clean();
?>