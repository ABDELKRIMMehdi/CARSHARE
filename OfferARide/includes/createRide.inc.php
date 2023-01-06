 <?php
session_start();

if(isset($_POST['submit'])){

    $from = $_POST['from'];
    $to = $_POST['to'];
    $hour = $_POST['hour'];
    $day = $_POST['day'];
    $seats  = intval($_POST['nbrPlaces']);
    $model = $_POST['model'];
    $tripDescription = $_POST['tripDescription'];
    $music = "no";
    $animals = "no";
    $smoking = "no";
    $luggage = "no";
    $price = intval($_POST['price']);
    if(isset($_POST['musiccheckbox'])){
        $music= "yes";
    }
    if(isset($_POST['animalcheckbox'])){
        $animals= "yes";
    }
    if(isset($_POST['smokingcheckbox'])){
        $smoking= "yes";
    }
    if(isset($_POST['luggagecheckbox'])){
        $luggage= "yes";
    }
    $owner = $_SESSION['id'];

/*
echo("<p>");
echo("from is : ". $from);
echo("<br/></p>");
echo("<p>");
echo("to is : ". $to);
echo("<br/></p>");
echo("<p>");
echo("hour is : ". $hour);
echo("<br/></p>");
echo("<p>");
echo("day is : ". $day);
echo("<br/></p>");
echo("<p>");
echo("seats is : ". $seats);
echo("<br/></p>");
echo("<p>");
echo("model is : ". $model);
echo("<br/></p>");
echo("<p>");
echo("tripDescription is : ". $tripDescription);
echo("<br/></p>");
echo("<p>");
echo("owner is : "); print_r($owner);
echo("<br/></p>");
echo("<p>");
echo("music is : ". $music);
echo("<br/></p>");
echo("<p>");
echo("animals is : ". $animals);
echo("<br/></p>");
echo("<p>");
echo("smoking is : ". $smoking);
echo("<br/></p>");
echo("<p>");
echo("luggage is : ". $luggage);
echo("<br/></p>");
*/
require_once 'dbh.php';
require_once 'fnc.inc.php';
if($from == $to){
    header("Location: ../Offer.php?error=sameLocations");
    exit();
}
if(emptyInput($from, $to, $hour, $day, $seats, $model,  $music, $animals, $smoking, $luggage, $price, $owner) !== false){

    header("Location: ../Offer.php?error=emptyInput");
    exit();
}
if(RideExists($conn, $from, $to, $hour, $day, $seats, $music, $animals, $smoking, $luggage, $owner) !== false){
    header("Location: ../Offer.php?error=existingRide");
    exit();
}

createRide($conn, $from, $to, $hour, $day, $seats, $model, $tripDescription, $music, $animals, $smoking, $luggage, $price, $owner);
}else{
    header("Location: ../Offer.php?error=unknown");
    exit();
}