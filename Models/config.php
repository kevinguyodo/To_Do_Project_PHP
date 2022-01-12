<?php
try {
  $bdd = new PDO('mysql:host=localhost;dbnamed=todolistbdd;charset=utf8','root','root');
}catch(exception $e) {
  die('Error' . $e->getMessage());
}
?>