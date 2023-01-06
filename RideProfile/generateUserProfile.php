<?php

function genUserProfile($conn, $id){
        $sql = "SELECT * FROM users WHERE id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../SearchForARide/search.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        global $driver;
        $driver = array();
        if($driver = mysqli_fetch_assoc($resultData)){
            return $driver;   
        }else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
}