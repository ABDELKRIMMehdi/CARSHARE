<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="search.css" type="text/css" />
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../Header/header.css" type="text/css" />
    <link rel="stylesheet" href="../Footer/footer.css" type="text/css" />
</head>

<body>
  <?php
    include '../Header/header.php';
    ?>
  <div id="pagecontainer">
    <div id="pageheader" style="height: 110px; vertical-align: middle;">
      <h1 style="font-size: calc(26px + 1vw);"> JOIN A RIDE</h1>
    </div>
    <form id="createRideForm" action="<?php echo $_SERVER['PHP_SELF']." #result"; ?>" method ="post">
      <div id="section1">
        <div id="firstform">
          <span> Find a Trip that matches your criteria :</span>
          <div id="inputsContainer">
            <div id="inputs" style="width: 100%;">
              <div style="white-space: nowrap;">
                <input name="from" type="text" class="input auto" placeholder="from" id="from" required><i
                  class="fas fa-map-marker-alt InputIcons"></i>
              </div>
              <div style="white-space: nowrap;">
                <input type="text" name="to" class="input auto" placeholder="to" id="to" required><i
                  class="fas fa-map-marked-alt InputIcons"></i>
              </div>
              <div style="white-space: nowrap;">
                <input name="day" type="date" class="input" id="date" min="" max="" required><i
                  class="fas fa-calendar InputIcons"></i>
              </div>
            </div>
          </div>
        </div>
        <div id="section4">
          <div id="ButtonContainer">
            <button type="submit" id="SubmitButton" name="submit">SEARCH<i style="margin-left : 10px" class="fas fa-search-location"></i></button>
          </div>
        </div>
      </div>
    </form>
    <div id="result">
      <?php
                                    
                                    
                                      require_once 'dbh.php';
                                      if(isset($_POST['submit'])){

                                        $from = mysqli_real_escape_string($conn, $_POST['from']);
                                        $to = mysqli_real_escape_string($conn, $_POST['to']);
                                        $date = mysqli_real_escape_string($conn, $_POST['day']);
                                        $sql = "SELECT * FROM rides WHERE startingPoint LIKE '%$from%' AND arrival LIKE '%$to%' AND journeyDate LIKE '%$date%';";
                                       $result = mysqli_query($conn, $sql);
                                       $queryResult = mysqli_num_rows($result);

                                        if( $queryResult > 0){ 
                                          echo "<div id='sect'>";
                                          
                                          while($row = mysqli_fetch_assoc($result)){
                                             if(isset($_SESSION["id"])){
                                              echo"<a href = '../RideProfile/rideProfile.php?rideId=" . $row['rideId'] . "'>";
                                             }else{
                                              echo"<a href = '../Login/login.php' target='_blank'>";
                                             }
                                            
                                            echo "<div class='ride'>" . "<span id='start'> Starting Point :" . $row['startingPoint'] . "</span>" . "<span id='arriv'> Arrival :" . $row['arrival'] . "</span>" . "<span id='date'> Day :" . $row['journeyDate'] . "</span>" . "<span id='heure'> Hour :" . $row['hour'] . "</span>" . "<span id='seat'> Seats :" . $row['numLeft'] . "/" . $row['seats'] .  "</span>" . "<span id='modele'> Car Model :" . $row['model'] . "</span>" . "</div>";                                                                                                                                                         
                                             echo "</a></div>";
                                            
                                          } 
                                      } else{
                                        echo "<div id='sect1'>";
                                        echo"<h1>SORRY ! <br> NO TRIP FOR THIS DAY </h1> ";
                                        echo "</div>";
                                      }  
                                    }
                                                                                                                                                                                                                                                                                                                                                         
                              ?>
      </div>
  </div>
  <?php
    include '../Footer/footer.php'
  ?>
    <script src="../Header/header.js"></script>
    <script>
        let autocomplete;
        function initAutocomplete() {
            autocomplete = new google.maps.places.Autocomplete(
                document.getElementById("from")  , {
                types: [('geocode')],
                componentRestrictions: { 'country': ['DZ'] },
                fields: ['place_id', 'geometry', 'name']
            });
            autocomplete = new google.maps.places.Autocomplete(
            document.getElementById("to")  , {
                types: [],
                componentRestrictions: { 'country': ['DZ'] },
                fields: ['place_id', 'geometry', 'name']
            });
        }
    </script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByVcYqdGN0E3YWO1QxKl2a3X6_qno3iMM&libraries=places&callback=initAutocomplete">
</script>
<script src="search.js"></script>

</body>

</html>