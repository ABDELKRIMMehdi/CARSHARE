<?php
if(isset($_POST['submit'])){

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $phone = $_POST['full_phone'];
    $timezone = date_default_timezone_get();
    date_default_timezone_set($timezone);
    $insdate = date("Y-m-d");
/*}

echo("firstName is : ". $firstName);
echo("lastName is : ". $lastName);
echo("birthday is : ". $birthday);
echo("gender is : ". $gender);
echo("email is : ". $email);
echo("password is : ". $password);
echo("phone is : " .$phone);
echo("insdate is : ". $insdate);*/

    require_once 'dbh.php';
    require_once 'fnc.inc.php';

    if(emptyInputSignUp($firstName, $lastName, $birthday, $gender, $email, $password) !== false){

        header("Location: ../SignUp.php?error=emptyInput");
        exit();

    }if(invalidFN($firstName) !== false){

        header("Location: ../SignUp.php?error=invalidFirstName");
        exit();

    }if(invalidLN($lastName) !== false){

        header("Location: ../SignUp.php?error=invalidLastName");
        exit();

    }if(invalidEmail($email) !== false){

        header("Location: ../SignUp.php?error=invalidEmail");
        exit();

    }if(userExists($conn, $email) !== false){

        header("Location: ../SignUp.php?error=existingEmail");
        exit();

    }
        CreateUser($conn, $firstName, $lastName, $birthday, $gender, $email, $password, $phone, $insdate);
 
}else{
    header("Location: ../../Login/Login.php");
    exit();
}