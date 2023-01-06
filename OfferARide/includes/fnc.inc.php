<?php
function emptyInput($from, $to, $hour, $day, $seats, $model,  $music, $animals, $smoking, $luggage,$price, $owner){
    $result;
    if(empty($from) || empty($to) || empty($hour) || empty($day) || empty($seats) || empty($model) || empty($luggage) || empty($owner)|| empty($price) || empty($smoking) || empty($animals) || empty($music)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}


function RideExists($conn, $from, $to, $hour, $day, $seats, $music, $animals, $smoking, $luggage, $owner){
    $sql = "SELECT * FROM rides WHERE startingPoint = ? AND arrival = ? AND hour = ? AND journeyDate = ? AND seats = ? AND music = ? AND animals = ? AND smoking = ? AND luggage = ? AND  driver = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Offer.php?error=stmt1Failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssissssi", $from, $to, $hour, $day, $seats, $music, $animals, $smoking, $luggage, $owner);
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

function createRide($conn, $from, $to, $hour, $day, $seats, $model, $tripDescription, $music, $animals, $smoking, $luggage, $price, $owner){
    $sql = "INSERT INTO `rides` (startingPoint, arrival, hour, journeyDate, seats, model, tripBio, music, animals, smoking, luggage, price , driver, numLeft) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../Offer.php?error=stmt2Failed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssssissssssiii",$from, $to, $hour, $day, $seats, $model, $tripDescription, $music, $animals, $smoking, $luggage, $price, $owner, $seats);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("Location: ../Offer.php?error=none");
    exit();
}