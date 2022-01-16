<?php

    try{
        $db = new PDO('sqlite:../Models/BDD.db');
        $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }catch(PDOException $e){
        echo "not connected";

    }
?>

