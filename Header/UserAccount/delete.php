<?php

        session_start();     
      
if(isset($_POST['submit'])){
    $Password = $_POST['Password'];

    require_once 'dbh.php';

    if(password_verify($Password, $_SESSION['password']) == false){
        header("Location: UserAccount.php?error=wrongpassword3");
        exit();
    }else{
        /*notification for created rides*/

        $sql2 = "SELECT * FROM rides WHERE driver = ?;";
        $stmt2 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt2, $sql2)){
            header("Location: .userAccount.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt2, "i", $_SESSION['id']);
        mysqli_stmt_execute($stmt2);
        $resultData = mysqli_stmt_get_result($stmt2);
        mysqli_stmt_close($stmt2);

        if(mysqli_num_rows($resultData) > 0){
            while($row = mysqli_fetch_assoc($resultData)){
                $sql3 = "SELECT participantId FROM participants WHERE rideId = ?;";
        $stmt3 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt3, $sql3)){
            header("Location: .userAccount.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt3, "i", $row['rideId']);
        mysqli_stmt_execute($stmt3);
        $resultData2 = mysqli_stmt_get_result($stmt3);

        if(mysqli_num_rows($resultData2) > 0){
            while($row2 = mysqli_fetch_assoc($resultData2)){

                $type = "CanceledRide";
                $date = date('d-m-y');
                $read = "no";
                $content = "<div class='cancelride'><span id='start'> The ride going from : " . $row['startingPoint'] . " </sapn><span id='arrival'> to : " . $row['startingPoint'] . " </span><span id='date'> on the : " . $row['journeyDate'] . " </span><span id='heure'> at : " . $row['hour']  . " </span><p id='para1'> HAS BEEN CANCELED</p><span class = 'daysent'> Sent on : ". $date ."</span></div>";
                $sql4 = "INSERT INTO notifications (subject, content, Type, date, ReadouNot) VALUES (?, ?, ?, ?, ?);";
                $stmt4 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt4, $sql4)){
                    header("Location: ../SearchForARide/recherche.php?error=stmt1Failed");
                    exit();
                }
                mysqli_stmt_bind_param($stmt4, "issss", $row2['participantId'], $content, $type, $date, $read);
                mysqli_stmt_execute($stmt4);
                mysqli_stmt_close($stmt4);  
            }
        
        }
            
            
        }
        }
        mysqli_stmt_close($stmt3);
/* end notification */
        /*notifications for participation*/
        $sql5 = "SELECT * FROM participants WHERE participantId = ?;";
        $stmt5 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt5, $sql5)){
            header("Location: ../userAccount.php?error=stmt1Failed");
            exit();
        }
        mysqli_stmt_bind_param($stmt5, "i", $_SESSION['id']);
        mysqli_stmt_execute($stmt5);
        $resultData5 = mysqli_stmt_get_result($stmt5);

        if(mysqli_num_rows($resultData5) > 0){
            while($row5 = mysqli_fetch_assoc($resultData5)){
                $sql6 = "SELECT * FROM rides WHERE rideId = ?;";
                $stmt6 = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt6, $sql6)){
                    header("Location: ../userAccount.php?error=stmt1Failed");
                    exit();
                }
                mysqli_stmt_bind_param($stmt6, "i",  $row5['rideId']);
                mysqli_stmt_execute($stmt6);
                $resultData6 = mysqli_stmt_get_result($stmt6);
        
                $rows6 = array();
                if(mysqli_num_rows($resultData6) > 0){
                    while($row6 = mysqli_fetch_assoc($resultData6)){

                        $type = "CanceledParticipation";
                        $date = date('d-m-y');
                        $read = "no";
                        $content = "<div class='cancelparticipation'><span id='nom'> The user " . $_SESSION['lastname'] . " </sapn><span id='prenom'> " . $_SESSION['firstname'] . " </span><p id='para2'> has canceled his participation to your trip </p><span id='depart1'> going from : " . $row6['startingPoint'] . " </span><span id='arrival2'> to : " . $row6['arrival'] . " </span><span id='date2'> on the : " . $row6['journeyDate'] . " </span><span class = 'daysent'> Sent on : ". $date ."</span></div>";
                        $sql7 = "INSERT INTO notifications (subject, content, Type, date, ReadouNot) VALUES (?, ?, ?, ?, ?);";
                        $stmt7 = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt7, $sql7)){
                            header("Location: ../SearchForARide/recherche.php?error=stmt1Failed");
                            exit();
                        }
                        mysqli_stmt_bind_param($stmt7, "issss", $row6['driver'], $content, $type, $date, $read);
                        mysqli_stmt_execute($stmt7);
                        mysqli_stmt_close($stmt7);

                        $sql8 = "UPDATE rides SET numLeft = numLeft + ". $row5['nbPlaces'] ." where rideId = ?;";
                        $stmt8 = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt8, $sql8)){
                            header("Location: ../SearchForARide/recherche.php?error=stmt1Failed");
                            exit();
                        }
                        mysqli_stmt_bind_param($stmt8, "i", $row6['rideId']);
                        mysqli_stmt_execute($stmt8);
                        mysqli_stmt_close($stmt8);
                    }
            }}}
            





/* end notification */

        $sql = "DELETE FROM users WHERE id = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: UserAccount.php?error=stmtFailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        session_unset();
        session_destroy();
        header("Location: ../../../index.php");
            exit();
    }}else{
        header("Location: UserAccount.php");
        exit();
    }