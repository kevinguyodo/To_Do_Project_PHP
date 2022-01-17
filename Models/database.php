<?php

    try{
        $db = new PDO('mysql:host=localhost:8889 ;dbname=databasePhpProject; charset=utf8', 'root', 'root' );
        $db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }catch(PDOException $e){
        echo $e;

    }
?>