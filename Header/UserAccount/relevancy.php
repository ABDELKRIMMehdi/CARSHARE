<?php
function isRelevant($rideDate){
    $date_now = new DateTime();
    $date = new DateTime($rideDate);
   if ($date_now > $date) {
       return false;
   }else{
       return true;
   }
}