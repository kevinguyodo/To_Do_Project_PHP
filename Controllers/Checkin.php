<?php 
session_start();
require_once '../Models/config.php';
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $check = $bdd->prepare('SELECT * FROM todolistbdd.users where username = ?');
    $check->execute(array($username));
    $data = $check->fetch();
    $row =$check->rowCount();
    if ($row ==1){
        if ($data['password'] ===$password){
            $_SESSION['user'] =$data['username'];
            header('Location:../View/Accueil.php');

        }else header('Location:../View/Index.php?login=password');
    }else header('Location:../View/Index.php?login_err=already');


} else header('Location:../View/Index.php?');
