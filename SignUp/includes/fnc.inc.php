<?php

function emptyInputSignUp($firstName, $lastName, $birthday, $gender, $email, $password){
    $result;
    if(empty($firstName) || empty($lastName) || empty($birthday) || empty($gender) || empty($email) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidFN($firstName){
    $result;
    if(!preg_match("/^[a-zA-Z]*$/", $firstName)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidLN($lastName){
    $result;
    if(!preg_match("/^[a-zA-Z]*$/", $lastName)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
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
        header("Location: ../SignUp.php?error=stmt1Failed");
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

function CreateUser($conn, $firstName, $lastName, $birthday, $gender, $email, $password, $phone, $insdate){

    $sql = "INSERT INTO users (lastname, firstname, birthday, gender, tel, email, password, inscdate) VALUES (? , ? , ?, ? , ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../SignUp.php?error=stmt2Failed");
        exit();
    }

    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssssssss",$lastName, $firstName, $birthday, $gender, $phone, $email, $hashedpwd, $insdate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("Location: ../../Login/Login.php");
    exit();
}

