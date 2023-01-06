<?php
function Mynotif($conn, $id){
    $sql = "SELECT * FROM notifications WHERE subject = ?";
     $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        Header("Location: ../tester.php?error=stmt1Failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['id']);
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

