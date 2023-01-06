<?php
session_start();
require_once 'UserRides.php';
require_once 'dbh.php';
?>   
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CarShare | UserAccount</title>
  <link rel="stylesheet" href="myAdminAccount.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:700,400">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
  <div class="layout">

    <input name="nav" type="radio" class="trips-radio" id="trips" checked />
    <div class="page trips-page">
      <div class="page-contents">


      <?php 
        echo"<div id='myRides'>";
        echo"<h1 style ='border : none; color: black; font-size: calc(25px + 1vw);margin-inline : auto;'>My Rides :</h1>";
 if(getMyRides($conn, $_SESSION["id"]) !== false){
  foreach($rows as $row){
    require_once 'relevancy.php';
    if(isRelevant($row["journeyDate"])){
    echo "<div class = 'ride'><a target='_blank' href = '../../RideProfile/rideProfile.php?rideId=" . $row['rideId'] . "'><div id ='locations'> <span id ='from'> from : ". $row["startingPoint"] . "</span> <span id ='to'> to : " . $row["arrival"] . "</span> </div><div id='time'> <span id ='when'> the : " . $row["journeyDate"] . "</span><span id ='at'> at : " . $row["hour"] . "</span></div><div id='howManyLeft'> <span id ='seats'> with : " . $row["numLeft"] . " free seats left</span></div>
    <div id='icons'>";


    if($row['music'] =='yes'){
      echo"<span style='margin-right: 15px;'><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-music note' id='note'></i></span>";
  }else{
      echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : red' class='fas fa-music note' id='note'></i></span>";
  }
  if($row['animals'] =='yes'){
      echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-paw animals' id='animals'></i></span>";
  }else{
      echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : red' class='fas fa-paw animals' id='animals'></i></span>";
  }
  if($row['smoking'] =='yes'){
      echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-smoking cigarette' id='cigarette'></i></span>";
  }else{
      echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : red' class='fas fa-smoking cigarette' id='cigarette'></i></span>";
  }
  if($row['luggage'] =='yes'){
      echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-suitcase luggage'
      id='luggage'></i></span>";
  }else{
      echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : red' class='fas fa-suitcase luggage'
      id='luggage'></i></span>";
  }
echo"
     </div>
    </a>

    <button class ='deleteridebutton' style='z-index : 1000; width : 20%; height : 18%; background : red; color : white; outline : none; border : none; border-radius : 10px;' onclick= 'deleteThisRide( " . $row['rideId'] . ',"' . $row['startingPoint'] .'","'. $row['arrival'] . '","' . $row['journeyDate'] .'","' . $row['hour'] . '"' ."  )'>DELETE</button>







   
    




    </div>";
  }else{
    echo "<h1 style='border : none; color: #8a8a8a; margin-inline : auto; '>YOU CURRENTLY HAVE NO RIDES</h1>";
  }}
}else{
echo "<h1 style='border : none; color: #8a8a8a; margin-inline : auto; '>YOU CURRENTLY HAVE NO RIDES</h1>";
}   
echo"</div>";  




echo"<div id='JoinedRides'>";
echo"<h1 style ='border : none; color: black; font-size: calc(25px + 1vw);margin-inline : auto;'>My Joined Rides :</h1>";
if(getMyJoinedRidesIds($conn, $_SESSION["id"]) !== false){
foreach($rideRows as $rideRow){
  if(getMyJoinedRides($conn, $rideRow['rideId']) !== false){
    foreach($echoRideRows as $echoRide){
      if(isRelevant($echoRide["journeyDate"])){
      echo "<div class = 'ride'><a  target='_blank'  href = '../../RideProfile/rideProfile.php?rideId=" . $echoRide['rideId'] . "'><div id ='locations'> <span id ='from'> from : ". $echoRide["startingPoint"] . "</span> <span id ='to'> to : " . $echoRide["arrival"] . "</span> </div><div id='time'> <span id ='when'> the : " . $echoRide["journeyDate"] . "</span><span id ='at'> at : " . $echoRide["hour"] . "</span></div><div id='howManyLeft'> <span id ='seats'> with : " . $echoRide["numLeft"] . " free seats left</span></div><div id='icons'> ";
      

      if($echoRide['music'] =='yes'){
                echo"<span style='margin-right: 15px;'><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-music note' id='note'></i></span>";
            }else{
                echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : red' class='fas fa-music note' id='note'></i></span>";
            }
            if($echoRide['animals'] =='yes'){
                echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-paw animals' id='animals'></i></span>";
            }else{
                echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : red' class='fas fa-paw animals' id='animals'></i></span>";
            }
            if($echoRide['smoking'] =='yes'){
                echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-smoking cigarette' id='cigarette'></i></span>";
            }else{
                echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : red' class='fas fa-smoking cigarette' id='cigarette'></i></span>";
            }
            if($echoRide['luggage'] =='yes'){
                echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : rgb(100, 205, 236)' class='fas fa-suitcase luggage'
                id='luggage'></i></span>";
            }else{
                echo"<span style='margin-right : 15px;'><i style =' margin-right : 10px; color : red' class='fas fa-suitcase luggage'
                id='luggage'></i></span>";
            }

  
echo"
</div>
</a><button class ='deleteridebutton' style='z-index : 1000; width : 20%; height : 18%; background : red; color : white; outline : none; border : none; border-radius : 10px;' onclick= 'CancelThisRide( " .'"' . $_SESSION['lastname'] . '","'. $_SESSION['firstname'] . '","'. $echoRide['startingPoint'] . '","'. $echoRide['arrival'] . '","'. $echoRide['journeyDate'] . '",'. $echoRide["driver"] . ',' . $echoRide['rideId'] . ','. $_SESSION['id'] . " )'>CANCEL</button>
</div>";
    }else{
      echo "<h1 style='border : none; color: #8a8a8a; margin-inline : auto; '>YOU CURRENTLY HAVE NOT JOINED ANY RIDE</h1>";
    }}
    
  }


}
}else{
echo "<h1 style='border : none; color: #8a8a8a; margin-inline : auto; '>YOU CURRENTLY HAVE NOT JOINED ANY RIDE</h1>";
}
echo"</div>";
      ?>



      </div>
    </div>
    <label class="nav" for="trips">
      <span>
        <svg viewBox="0 0 27 37" xmlns="http://www.w3.org/2000/svg">
          <defs></defs>
          <g transform="matrix(0.006000, 0, 0, -0.008952, 0, 37)" fill="white" stroke="currentColor" style="">
            <path d="M 4808.016 3426.375 C 4427.329 3400.096 4119.599 3349.351 3896.051 3275.046 C 3714.593 3214.333 3343.26 3023.132 3063.591 2846.429 C 2724.059 2631.668 2433.166 2531.084 2030.03 2488.494 C 1749.426 2459.497 1407.088 2400.596 1146.126 2338.071 C 504.476 2182.21 126.595 1960.2 26.513 1679.288 C 6.871 1624.012 5 1603.171 5 1441.873 C 5.935 1311.385 9.677 1244.329 22.772 1184.522 C 83.569 883.675 219.195 684.319 432.454 580.11 L 485.769 553.831 L 752.344 553.831 L 1017.983 553.831 L 1055.397 487.681 C 1176.057 275.638 1383.704 117.059 1641.86 40.035 C 1721.365 16.475 1736.331 15.569 1903.758 15.569 C 2069.315 15.569 2087.086 17.381 2163.785 40.035 C 2332.148 89.874 2450.937 156.931 2572.532 270.201 C 2645.49 337.258 2741.831 462.308 2768.02 524.834 L 2780.18 553.831 L 4592.886 553.831 L 6405.592 553.831 L 6417.751 524.834 C 6439.264 474.088 6515.028 368.973 6574.89 307.354 C 6713.322 163.274 6892.909 65.408 7090.267 26.443 C 7164.16 11.944 7203.444 9.226 7319.428 12.85 C 7490.597 18.287 7567.295 36.411 7712.274 105.279 C 7888.12 187.74 8048.064 334.539 8133.181 491.306 L 8166.854 553.831 L 8328.669 553.831 C 8518.545 553.831 8594.308 568.33 8713.097 626.324 C 8961.9 748.657 9116.233 982.447 9156.453 1296.887 C 9177.03 1450.029 9164.871 1850.554 9134.004 2087.969 C 9099.396 2352.569 9044.211 2471.277 8921.68 2549.207 C 8811.309 2619.888 8733.675 2632.574 8334.281 2642.542 C 7991.943 2652.51 7897.473 2671.539 7772.137 2758.531 C 7543.911 2917.11 7264.242 3062.097 6965.866 3176.274 C 6645.041 3299.512 6323.281 3376.536 5977.202 3413.689 C 5819.128 3430.906 5003.504 3439.062 4808.016 3426.375 Z M 5738.688 3154.526 C 6155.854 3133.684 6477.614 3065.721 6856.43 2921.641 C 7120.198 2821.057 7360.583 2697.818 7602.838 2538.333 C 7812.357 2401.502 7890.926 2385.191 8410.98 2366.162 C 8728.998 2354.382 8757.994 2348.038 8798.214 2288.232 C 8839.369 2228.425 8871.171 1976.511 8882.396 1618.575 C 8893.62 1269.702 8852.464 1106.592 8717.774 967.949 C 8620.498 866.458 8516.674 825.681 8352.988 825.681 L 8254.776 825.681 L 8253.841 959.793 C 8252.906 1070.345 8248.229 1107.498 8228.587 1179.991 C 8144.405 1490.806 7907.762 1740.002 7601.903 1840.586 C 7482.178 1879.551 7416.704 1889.519 7272.66 1888.613 C 7163.224 1888.613 7126.746 1884.082 7048.177 1864.146 C 6943.417 1837.867 6792.826 1769.905 6716.128 1714.629 C 6579.567 1615.857 6456.101 1468.152 6393.432 1326.79 C 6338.247 1203.552 6322.346 1126.528 6316.734 968.855 L 6311.122 825.681 L 4591.951 825.681 L 2871.844 825.681 L 2871.844 941.67 C 2871.844 1138.308 2828.818 1286.013 2722.188 1455.466 C 2507.058 1797.996 2059.026 1965.637 1647.473 1857.803 C 1550.196 1832.43 1395.864 1767.186 1327.583 1721.878 C 1121.806 1586.86 970.28 1325.884 935.672 1048.597 C 929.125 997.852 927.254 931.702 930.995 892.737 L 937.543 825.681 L 746.732 825.681 L 554.985 825.681 L 511.024 853.772 C 391.299 931.702 312.73 1099.343 289.346 1331.321 C 275.316 1466.34 281.863 1561.487 307.118 1615.857 C 424.972 1873.208 1120.871 2113.342 2044.06 2215.738 C 2157.238 2228.425 2291.928 2246.548 2343.372 2257.422 C 2638.942 2315.417 2935.448 2435.936 3193.604 2601.765 C 3429.312 2753.094 3769.779 2934.327 3942.818 3001.384 C 4136.436 3076.595 4467.549 3131.871 4850.107 3153.619 C 5032.5 3164.493 5536.653 3164.493 5738.688 3154.526 Z M 2007.582 1604.077 C 2185.298 1580.516 2347.113 1489.9 2448.131 1357.6 C 2531.377 1247.954 2566.92 1131.058 2566.92 975.198 C 2565.985 860.115 2559.438 822.962 2504.252 659.852 C 2479.933 587.359 2465.903 560.174 2427.553 517.584 C 2300.346 372.598 2132.919 293.762 1931.819 284.7 C 1799.934 278.357 1699.852 300.105 1579.192 360.818 C 1484.722 407.938 1382.769 495.836 1323.842 582.828 C 1255.561 684.319 1214.406 894.549 1234.048 1049.503 C 1254.626 1215.332 1300.458 1307.761 1416.441 1420.125 C 1527.748 1527.959 1628.766 1576.892 1791.516 1601.358 C 1888.793 1615.857 1919.659 1615.857 2007.582 1604.077 Z M 7487.79 1565.112 C 7697.309 1499.868 7852.577 1341.289 7908.697 1133.777 C 7917.116 1101.155 7926.469 1025.943 7929.275 966.136 C 7933.017 871.895 7930.21 841.085 7908.697 739.595 C 7881.572 607.295 7863.801 572.861 7786.167 490.399 C 7574.778 269.295 7221.216 217.644 6945.288 368.067 C 6867.654 409.751 6756.348 511.241 6706.774 584.641 C 6622.593 708.785 6593.597 837.461 6613.239 997.852 C 6650.653 1300.511 6853.624 1522.522 7146.388 1583.235 C 7239.923 1602.264 7395.191 1594.109 7487.79 1565.112 Z" style=""></path>
          </g>
        </svg>
        My Rides
      </span>

    </label>


  </div>
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="generate.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</body>

</html>