<?php

        session_start();     
      
if(isset($_POST['submit'])){
    $oldPassword = $_POST['OldPassword'];
    $newPassword = $_POST['NewPassword'];

    require_once 'dbh.php';
    require_once 'fnc.inc.php';

if(password_verify($oldPassword, $_SESSION['password']) == false){
    header("Location: UserAccount.php?error=wrongpassword2");
    exit();
}
    passwordChange($conn, $newPassword);
}else{
    header("Location: UserAccount.php");
    exit();
}

