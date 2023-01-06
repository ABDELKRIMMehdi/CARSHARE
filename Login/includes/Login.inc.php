<?php

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $password = $_POST['Password'];

    require_once 'dbh.php';
    require_once 'fnc.inc.php';

    if(emptyInputLogin($email, $password) !== false){

        header("Location: ../Login.php?error=emptyInput");
        exit();

    }
    loginUser($conn, $email, $password);
}else{
    header("Location: ../Login.php?error=unknown");
    exit();
}