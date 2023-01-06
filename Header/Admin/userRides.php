<?php

function getMyRides($conn, $owner){
        $sql = "SELECT * FROM rides WHERE driver = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../SignUp.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $owner);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);

        global $rows;
        $rows = array();
        if(mysqli_num_rows($resultData) > 0){
            while($row = mysqli_fetch_assoc($resultData)){
                $rows[] = $row;
            }
            return $rows;   
        }else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
}

function getMyJoinedRidesIds($conn, $participant){
    $sql = "SELECT rideId FROM participants WHERE participantId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../SignUp.php?error=stmt3Failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $participant);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    global $rideRows;
    $rideRows = array();
    if(mysqli_num_rows($resultData) > 0){
        while($row = mysqli_fetch_assoc($resultData)){
            $rideRows[] = $row;
        }
        return $rideRows;
    }else{
            return false;
        }
    mysqli_stmt_close($stmt);
    
}

function getMyJoinedRides($conn, $ride){
    $sql = "SELECT * FROM rides WHERE rideId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../SignUp.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $ride);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    global $echoRideRows;
    $echoRideRows = array();
    if(mysqli_num_rows($resultData) > 0){
        while($row = mysqli_fetch_assoc($resultData)){
            $echoRideRows[] = $row;
        }
        return $echoRideRows;
    }else{
            return false;
        }
    mysqli_stmt_close($stmt);
    
}


function getParticipants($conn, $ride){
    $sql = "SELECT participantId FROM participants WHERE rideId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../SignUp.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $ride);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    global $participantsRows;
    $participantsRows = array();
    if(mysqli_num_rows($resultData) > 0){
        while($row = mysqli_fetch_assoc($resultData)){
            $participantsRows[] = $row;
        }
        return $participantsRows;
    }else{
            return false;
        }
    mysqli_stmt_close($stmt);
    
}

function getParticipant($conn, $userid){
    $sql = "SELECT * FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../SignUp.php?error=stmtFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    global $RideParticipant;
    $RideParticipant = array();
    if(mysqli_num_rows($resultData) > 0){
        while($participRow = mysqli_fetch_assoc($resultData)){
            $RideParticipant[] = $participRow;
        }
        return $RideParticipant;
    }else{
            return false;
        }
    mysqli_stmt_close($stmt);
    
}