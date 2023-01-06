<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="rideProfile.css">
    <link rel="stylesheet" href="../Footer/footer.css" type="text/css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>CarShare | RideProfile</title>
</head>
<body>

    <header>
        <h1>RIDE DETAILS</h1>
    </header>
    <?php
    session_start();
    require_once 'dbh.php';
    require_once 'generate.php';
    require_once 'exists.php';
    require_once 'userRides.php';
    require_once 'generateUserProfile.php';

    if(genProfile($conn, $_GET["rideId"]) !== false){


    if(genUserProfile($conn, $row['driver']) !== false){
    echo"<div id='intelcontainer'><div style='position: relative; top:8%; left: 5%; width: 40%; height: 25%; display : -webkit-inline-box !important; border-radius: 20px !important;'><i style='position: relative;top: 32%; left: 45%;' class='fas fa-user fa-3x'></i><div id='aboutTheDriver'>".
    "<span ><span class='title'>Driver's fullname : </span>". $driver['firstname'] ." ". $driver['lastname'] . "</span>".
    "<span ><span class='title'>Gender : </span>". $driver['gender'] . "</span>".
    "<span ><span class='title'>Date of birth : </span>". $driver['birthday'] . "</span>".
    "<span ><span class='title'>Joined the : </span>". $driver['inscdate'] . "</span>".
    "<span ><span class='title'>Tel : </span>". $driver['tel'] . "</span>".
    "<span ><span class='title'>email : </span>". $driver['email'] . "</span>"
    ."</div></div>";
    }



        
            echo"
        <div id='aboutTheRide'>
            <div id='place'> 
            <span id= 'from'><i style='color : rgb(100, 205, 236);'
            class='fas fa-map-marker-alt InputIcons'></i> <span class='title'>Starting point : </span>".
            $row['startingPoint']
            ."</span>
            <span id= 'to'><i style='color : rgb(115, 224, 71);'
            class='fas fa-map-marker-alt InputIcons'></i><span class='title'> arrival : ".
            $row['arrival']
            ."</span></span>
            
</div>
<div id='time'>
            <span id= 'at'><i style='color : rgb(100, 205, 236);'
            class='fas fa-clock InputIcons'></i><span class='title'> at : </span>".
            $row['hour']
            ."</span>
            <span id= 'the'><i style='color : rgb(100, 205, 236);' class='fas fa-calendar InputIcons'></i><span class='title'> day : </span>".
            $row['journeyDate']
            ."</span>
</div>

            <span id='vehicle'><span class='title'> Vehicle model : </span>".
            $row['model']
            ."</span>
            <span id='details'><span class='title'> Additional information : </span>".
            $row['tripBio']
            ."
            </span>
            <span id='icons'><span class='title'>
            ";
            if($row['music'] =='yes'){
                echo"<span><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-music note' id='note'></i>I don't mind music</span>";
            }else{
                echo"<span><i style =' margin-right : 10px; color : red' class='fas fa-music note' id='note'></i>I don't travel with music</span>";
            }
            if($row['animals'] =='yes'){
                echo"<span><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-paw animals' id='animals'></i>I don't mind animals</span>";
            }else{
                echo"<span><i style =' margin-right : 10px; color : red' class='fas fa-paw animals' id='animals'></i>I don't travel with animals</span>";
            }
            if($row['smoking'] =='yes'){
                echo"<span><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-smoking cigarette' id='cigarette'></i>I don't mind smoking</span>";
            }else{
                echo"<span><i style =' margin-right : 10px; color : red' class='fas fa-smoking cigarette' id='cigarette'></i>Smoking is not allowed in the vehicle</span>";
            }
            if($row['luggage'] =='yes'){
                echo"<span><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-suitcase luggage'
                id='luggage'></i>I have room for your luggage</span>";
            }else{
                echo"<span><i style =' margin-right : 10px; color : red' class='fas fa-suitcase luggage'
                id='luggage'></i>I do not have room for your luggage</span>";
            }
            echo"</span>
        </div>";

        echo "<div id='fee'>
        <span id='seats'><span class='title'> Free seats : </span><span id='greenORred' style='display: inline;'>".
        $row['numLeft']
        ."</span><span class='title'> / " . $row['seats'] . " </span></span>
        <span id='cost'><span class='title'> Rate : </span> <span class='title' style='color : #27affd;'>".
        $row['price']
        ." DA/Seat</span>
        </span>
        </div>";

    if($_SESSION['id'] !== $row['driver']  AND  !exists($conn, $_SESSION['id'] , $_GET["rideId"]) AND $row['numLeft'] > 0){
      echo "<div id='ammount'>
      <label for ='nbplaces'>Ammount of seats to reserve : </label>
      <input id='nbplaces' type ='number' min = 1 max = ". $row['numLeft'] . "></div>";
        echo"<div class='button Join'>";
        echo "<button onclick ='joinFNC( " . $_SESSION['id'] . ',"' . $_SESSION['firstname'] .'","' . $_SESSION['lastname'] . '","' . $row['startingPoint'] . '","' . $row['arrival'] . '","' . $row['journeyDate'] . '",'  . $row['driver'] .',' . $_GET['rideId'] . ',' . $row['numLeft'] . ")' id = 'join'><i style='color: white; margin-right: 15px;' class='far fa-thumbs-up'></i>JOIN</button>";
        echo"</div>";
    }else if($_SESSION['id'] == $row['driver'] OR exists($conn, $_SESSION['id'], $_GET["rideId"])){

        echo"
        <div class='ButtonContainer' style='font-size: calc(15px + 1vw); width : 200px ; position: absolute; top: 70.5%; right: 5%; display: inline-block;'>

        <button class ='trigger_popup_fricc' style='width: 100%; height : 50px;'><i class='far fa-envelope' style='color: white; margin-right: 15px;'></i><p id ='title' style ='display : inline;'>CONTACT</p></button>

        <div class='hover_bkgr_fricc'>
        <span class='helper'></span>
        <div style = 'height : 50%'>
            <div class='popupCloseButton'>&times;</div>
            <textarea id = 'message' placeholder = 'Your Message' style='width : 90%; height : 250px;'></textarea>
            <div style='font-size: calc(15px + 1vw); height : 13%' class='CONTACTdropdown'>
            <button type = 'button' style='width: 100%; top : 185% !important; position : absolute; left : 0%;' id = 'chat' onclick='myFunction1()' class='dropbtnCONTACT'>SEND TO <i style='margin-left : 7px; position: relative; top : -15%;' class='fas fa-sort-down'></i></button>
            <div style ='top : 285%;'id='myDropdownCONTACT' class='dropdown-contentCONTACT'>";
            if ($_SESSION['id'] !== $row['driver']){
              echo '<button onclick = "sendTo(' . $row['driver'] . "," . $_SESSION['id'] .')" type ="button"  >RIDE OWNER</button>';
            }
           if(getParticipants($conn, $row['rideId']) !== false){
              foreach($participantsRows as $participantid){
                if(getParticipant($conn, $participantid['participantId']) !== false){
                  foreach($RideParticipant as $participant){
                    if ($_SESSION['id'] !== $participant['id']){
                      echo '<button onclick = "sendTo(' . $participant['id'] . "," . $_SESSION['id'] .')" type ="button"> ID = '. $participant['id'] . ' ' . $participant['firstname'] . ' ' . $participant['lastname'] . '</button>';
                }}
            }
          
        }  }else{
          echo"<h1 style ='border : none; color: #8a8a8a; margin-inline : auto;font-size: 1.5rem ;'>NO ONE HAS JOINED THIS RIDE YET</h1>";
        }
            echo "
            </div>
            </div>
        </div>
    </div>

    </div>";
        

        echo "</div></div>";
    }

    if($_SESSION['id'] == $row['driver']){
       echo " 
        <div style='font-size: calc(15px + 1vw); top: 94%; right: 13%;' class='BANNdropdown'>
        <button style='font-size: calc(10px + 1vw); width : 100% !important; height : 52px; position: relative;  display: inline-block;' onclick='myFunction()' class='dropbtn'><i style='margin-right : 7px;' class='fas fa-gavel'></i><p style ='display : inline;'>BANN</p><i style='margin-left : 7px; position: relative; top : -15%;' class='fas fa-sort-down'></i></button>
        <div id='myDropdown' class='dropdown-content'>";
        if(getParticipants($conn, $row['rideId']) !== false){
          foreach($participantsRows as $participantid){
            if(getParticipant($conn, $participantid['participantId']) !== false){
              foreach($RideParticipant as $participant){
            echo  "<button onclick='CancelThisRide(" . $row['rideId'] . ',' . $participant['id'] . ',"' . $row['startingPoint'] . '","' . $row['arrival'] . '","' . $row['journeyDate'] . '"' .")'> ID = ". $participant['id'] . " " . $participant['firstname'] . " " . $participant['lastname'] . "</button>";
            }
        }
      }
    }else{
      echo"<h1 style ='border : none; color: #8a8a8a; margin-inline : auto;font-size: 1.5rem ;'>NO ONE HAS JOINED THIS RIDE YET</h1>";
    }
    
        echo "
        </div></div>";
    }
}
    ?>
<script src = "send.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src='generate.js'></script>
    <script>
        $( document ).ready(function(){
            var value = $("#greenORred").text();
        if(value == '0'){
            $("#greenORred").css('color', 'red');
        }else{
            $("#greenORred").css('color', '#27affd');
        }
        });

    </script>
    <script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function myFunction1() {
  document.getElementById("myDropdownCONTACT").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtnCONTACT')) {
    var dropdownsCON = document.getElementsByClassName("dropdown-contentCONTACT");
    var i;
    for (i = 0; i < dropdownsCON.length; i++) {
      var openDropdownCON = dropdownsCON[i];
      if (openDropdownCON.classList.contains('show')) {
        openDropdownCON.classList.remove('show');
      }
    }
  }
}

</script>
<?php
                  if (isset($_GET["error"])){
                    if ($_GET["error"] == "invalidinput"){
                        echo"<p style = 'margin-left : 45px; margin-top : 85px; color : red;'>Invalid number of seats</p>";
                    }
                  }

                    ?>
</body>
</html>