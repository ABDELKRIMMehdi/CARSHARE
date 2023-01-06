<?php
    require_once 'dbh.php';
function exists($conn, $id, $ride){
    $sql = "SELECT * FROM participants WHERE rideId = ? AND participantId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../HOME/home.php?error=stmt1Failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ii", $ride,$id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)){
        return true;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}