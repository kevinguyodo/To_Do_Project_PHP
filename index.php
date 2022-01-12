<?php
    ob_start();

?>

<h2>Home</h2>
<p>This is the homepage</p>

<?php
    $content = ob_get_clean();
?>

<?php
    require "./View/home_to_do_list_controllers.php"
?>