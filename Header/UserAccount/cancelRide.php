<?php
        require_once 'dbh.php';
if(isset($_POST['function'])) {
    if($_POST['function'] == "cancel") {

        $sql4 = "SELECT nbPlaces FROM participants WHERE participantId = ? AND rideId = ?;";
        $stmt4 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt4, $sql4)){
            header("Location: ../SignUp.php?error=stmt3Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt4, "ii", $_POST['userId'], $_POST['rideId']);
        mysqli_stmt_execute($stmt4);
        $resultData4 = mysqli_stmt_get_result($stmt4);
        $rideRows = array();
    if(mysqli_num_rows($resultData4) > 0){
        while($row = mysqli_fetch_assoc($resultData4)){
            $rideRows[] = $row;
        }
       
    }
        mysqli_stmt_close($stmt4);  




        

        $type = "CanceledParticipation";
        $date = date('d-m-y');
        $read = "no";
        $content = "<div class='cancelparticipation'><span id='nom'> The user " . $_POST['userLname'] . " </sapn><span id='prenom'> " . $_POST['userFname'] . " </span><p id='para2'> has canceled his participation to your trip </p><span id='depart1'> going from : " . $_POST['start'] . " </span><span id='arrival2'> to : " . $_POST['finish'] . " </span><span id='date2'> on the : " . $_POST['day'] . " </span><span id = 'daysent'> Sent on : ". $date ."</span></div>";
        $sql3 = "INSERT INTO notifications (subject, content, Type, date, ReadouNot) VALUES (?, ?, ?, ?, ?);";
        $stmt3 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt3, $sql3)){
            header("Location: ../SearchForARide/recherche.php?error=stmt2Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt3, "issss", $_POST['driverId'], $content, $type, $date, $read);
        mysqli_stmt_execute($stmt3);
        mysqli_stmt_close($stmt3);


        
        $sql = "DELETE FROM participants WHERE rideId = ? AND participantId = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: userAccount.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ii", $_POST['rideId'], $_POST['userId']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $sql2 = "UPDATE rides SET numLeft = numLeft + " . $rideRows[0]['nbPlaces'] . " WHERE rideId = ?;";
        $stmt2 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt2, $sql2)){
            header("Location: ../SearchForARide/recherche.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt2, "i", $_POST['rideId']);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);


    }
}

