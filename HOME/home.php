<?php
  session_start();
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content ="width = device-width, initial-scale=1.0"></meta>
<script src="https://kit.fontawesome.com/628c8d2499.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="../Header/header.css" type="text/css" />
<link rel="stylesheet" href="../Footer/footer.css" type="text/css" />
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="Home.css" type="text/css" />
    <title>CareShare.com | Home</title>
</head>

<body>
    <?php
    include '../Header/header.php';
    ?>
    <div id="contain">
    <div id="valueProp">
        <div id="bg">
        <h1>START CARPOOLING NOW</h1>
        <p>Driving together allows you to share costs, makes long drives more entertaining and helps protect the
            environment.<br />With CarSHare you will find a carpool partner for all your journeys. Place an ad and we will find
            the best match for you. Contact a driver or passenger, make arrangements and don’t forget to enjoy your
            ride!</p>
</div>
    </div>
    <div id="carpool">
        <h1 id="title">GOING SOMEWHERE ?</h1>
        <div id="offer">
            <h1>OFFER A RIDE</h1>
            <p>share your rides now and save money on each of your journeys by sharing the costs with your passengers.
            </p>
            <div class="button">
                <button onclick="redirectToregister()" id ="register">Register Your Ride</button>
            </div>
        </div>
        <div id="join">
            <h1>JOIN A RIDE</h1>
            <p>Take advantage of the many routes available in CareShare.com Just search for your destination, choose a
                date and join</p>
                <div class="button">
                    <button onclick="redirectToBrowse()" href="../SearchForARide/search.php" id="browse">Browse Rides</button>
                </div>
        </div>
    </div>

    <div id="aboutUs">
    <h1>About US</h1>
<p>We are a community of students who aim to build a network of bridges between individuals sharing a destination.<br/> the creation of CarShare.com has but one goal and it is to make traveling more economical for you and environmentally friendly, we make sure to put drivers looking to fill their empty seats in touch with
                passengers going the same way all around the country.<br/>Don't wait any longer, Share your car.
</p>
    </div>
</div>
    <?php
    include '../Footer/footer.php'
    ?>

    <script src="../Header/header.js"></script>
    <script>
        function redirectToBrowse(){
           window.location.href='../SearchForARide/search.php';
            }
        function redirectToregister(){
            <?php if(isset($_SESSION["id"])){ 
           echo "window.location.href='../OfferARide/Offer.php';}";
             }else{ 
               echo " window.open('../Login/login.php', '_blank');}";
           } ?>
    </script>
</body>

</html>