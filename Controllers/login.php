<?php
    ob_start();

?>



<?php
    $content = ob_get_clean();
?>

<?php
    require "../View/login.php"
?>