<?php
function emptyInputSignUp($firstName, $lastName, $email, $password){

    $result;
    if(empty($firstName) || empty($lastName) || empty($email) || empty($password)){
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
$unchanged = false;
function userExists($conn, $email, $unchanged){ 
    global $unchanged;
    if($email == $_SESSION["email"]){
       $unchanged = true;
    }
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: UserAccount.php?error=stmt1Failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)){
        if($unchanged){
        return $row;
        }else if($unchanged == false){
            return true;
        }
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}


function updateUser($conn, $firstName, $lastName, $email, $password, $phone){
    $userExists = userExists($conn, $email, $unchanged);
    if($userExists === true){
        header("Location: UserAccount.php?error=EmailTaken");
        exit();
    }else if($userExists === false){

        $sql = "SELECT * FROM users WHERE email = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: UserAccount.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $_SESSION["email"]);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultData);
        mysqli_stmt_close($stmt);

    echo $row["password"];
        $hashedpwd = $row["password"];
        $checkPwd = password_verify($password, $hashedpwd);
    }else{
        $hashedpwd = $userExists["password"];
        $checkPwd = password_verify($password, $hashedpwd);
    }
    if ($checkPwd === false){
        header("Location: UserAccount.php?error=WrongPassword");
        exit();
    }
    echo $sql = "UPDATE users SET lastname = ?, firstname = ?, tel = ?, email = ? WHERE id =" . $_SESSION['id'] ." ";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: UserAccount.php?error=stmt2Failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssss",$lastName, $firstName, $phone, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    session_unset();
    session_destroy();
    header("Location: ../../../index.php");
    exit();
}

/*password change*/

function passwordChange($conn, $newPassword){
    $hashedpwd = password_hash($newPassword, PASSWORD_DEFAULT);
    echo $sql = "UPDATE users SET password = ? WHERE id =" . $_SESSION['id'] ." ";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: UserAccount.php?error=stmt2Failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"s", $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    session_unset();
    session_destroy();
    header("Location: ../../../index.php");
    exit();
}