<?php

        session_start();     
      
if(isset($_POST['submit'])){
    $Password = $_POST['Password'];

    require_once 'dbh.php';

    if(password_verify($Password, $_SESSION['password']) == false){
        header("Location: UserAccount.php?error=wrongpassword3");
        exit();
    }else{
        $sql = "DELETE FROM users WHERE id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: UserAccount.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../../../index.php");
            exit();
    }}else{
        header("Location: UserAccount.php");
        exit();
    }