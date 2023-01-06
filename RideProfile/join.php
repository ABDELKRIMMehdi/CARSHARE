<?php
require_once 'dbh.php';
if(isset($_POST['function'])) {
    if($_POST['function'] == "join") {
        
        $sql = "INSERT INTO participants (rideId, participantId, nbPlaces) VALUES (? , ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../SearchForARide/recherche.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "iii", $_POST['ride'], $_POST['userId'], $_POST['res']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);


        $sql2 = "UPDATE rides SET numLeft = numLeft - ". $_POST['res'] ." where rideId = ?;";
        $stmt2 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt2, $sql2)){
            header("Location: ../SearchForARide/recherche.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt2, "i", $_POST['ride']);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);


       
        $type = "Join";
        $date = date('d-m-y');
        $content ="<div class='join'><span id='nomJ'> The user : " . $_POST['userFname'] . " </span><span id='prenomJ'> " . $_POST['userLname'] . " </sapn><p id='para3'> has joined your trip </p><span id='departJ'> going from : " . $_POST['start'] . " </span><span id='arrivalJ'> to : " . $_POST['finish'] . " </span><span id='dateJ'> on the : " . $_POST['day'] . "</span><span class = 'daysent'> Sent on : ". $date ."</span></div>";
        $read = "no";
        $sql3 = "INSERT INTO notifications (subject, content, Type, date, ReadouNot) VALUES (?, ?, ?, ?, ?);";
        $stmt3 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt3, $sql3)){
            header("Location: ../SearchForARide/recherche.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt3, "issss", $_POST['driverId'], $content, $type, $date, $read);
        mysqli_stmt_execute($stmt3);
        mysqli_stmt_close($stmt3);


    }else{
        header("location : lol.php");
        exit();
    }
}