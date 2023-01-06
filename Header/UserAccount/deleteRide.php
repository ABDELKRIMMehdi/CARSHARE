<?php
        require_once 'dbh.php';
if(isset($_POST['function'])) {
    if($_POST['function'] == "deleteRide") {

        /*notif*/
        $sql2 = "SELECT * FROM participants WHERE rideId = ?;";
        $stmt2 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt2, $sql2)){
            header("Location: .userAccount.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt2, "i", $_POST['rideId']);
        mysqli_stmt_execute($stmt2);
        $resultData = mysqli_stmt_get_result($stmt2);
        if(mysqli_num_rows($resultData) > 0){
            while($row = mysqli_fetch_assoc($resultData)){

                 

                    $type = "CanceledRide";
                    $date = date('d-m-y');
                    $read = "no";
                    $content = "<div class='cancelride'><span id='start'> The ride going from : " . $_POST['start'] . " </sapn><span id='arrival'> to : " . $_POST['finish'] . " </span><span id='date'> on the : " . $_POST['day'] . " </span><span id='heure'> at : " . $_POST['hour']  . " </span><p id='para1'> HAS BEEN CANCELED</p><span class = 'daysent'> Sent on : ". $date ."</span></div>";
                    $sql3 = "INSERT INTO notifications (subject, content, Type, date, ReadouNot) VALUES (?, ?, ?, ?, ?);";
                    $stmt3 = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt3, $sql3)){
                        header("Location: ../SearchForARide/recherche.php?error=stmt1Failed");
                        exit();
                    }
                    mysqli_stmt_bind_param($stmt3, "issss", $row['participantId'], $content, $type, $date, $read);
                    mysqli_stmt_execute($stmt3);
                    mysqli_stmt_close($stmt3);  
                        
                        
            }

        }mysqli_stmt_close($stmt2); 
        

/*end notif*/
        $sql = "DELETE FROM rides WHERE rideId = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../userAccount.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $_POST['rideId']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
}
}