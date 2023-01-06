<?php

function genProfile($conn, $rideID){
        $sql = "SELECT * FROM rides WHERE rideId = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../SearchForARide/search.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $rideID);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        global $row;
        $row = array();
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;   
        }else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
}