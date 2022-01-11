<?php 
session_start();
require_once 'config.php';
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
            header('Location:Accueil.php');

        }else header('Location:Index.php?login=password');
    }else header('Location:Index.php?login_err=already');


} else header('Location:Index.php?');
