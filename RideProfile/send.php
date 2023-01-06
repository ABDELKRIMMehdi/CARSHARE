<?php
        require_once 'dbh.php';
if(isset($_POST['function'])) {

    if($_POST['function'] == "send") {

$message = $_POST["mess"];
$content = "<div class= 'mail'><p id='par'>" . $message . "</p></div>";
$source = $_POST["sourceId"];
$target = $_POST["targetId"];
$type = "mail";
$date = date('d-m-y');
$read = "no";


$sql = "INSERT INTO notifications (subject, content, Type, date, source , ReadouNot) VALUES (?, ?, ?, ?, ?, ?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../SearchForARide/recherche.php?error=stmt1Failed");
    exit();
}
mysqli_stmt_bind_param($stmt, "isssis", $target, $content, $type, $date, $source, $read);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);  
    
    
}


    }

