<?php

function emptyInputLogin($email, $password){
    $result;
    if(empty($email) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function userExists($conn, $email){
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Login.php?error=stmt1Failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function loginUser($conn, $email, $password){
    $userExists = userExists($conn, $email);

    if($userExists === false){
        header("Location: ../Login.php?error=EmailNotFound");
        exit();
    }

    $hashedpwd = $userExists["password"];
    $checkPwd = password_verify($password, $hashedpwd);
    if ($checkPwd === false){
        header("Location: ../Login.php?error=WrongPassword");
        exit();
    }elseif ($checkPwd === true) {
        session_start();
        $_SESSION["id"] = $userExists["id"];
        $_SESSION["password"] = $userExists["password"];
        $_SESSION["firstname"] = $userExists["firstname"];
        $_SESSION["lastname"] = $userExists["lastname"];
        $_SESSION["birthday"] = $userExists["birthday"];
        $_SESSION["gender"] = $userExists["gender"];
        $_SESSION["tel"] = $userExists["tel"];
        $_SESSION["email"] = $userExists["email"];
        $_SESSION["inscdate"] = $userExists["inscdate"];
        header("Location: ../../HOME/home.php");
        exit();
    }
}