<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width = device-width, initial-scale=1.0">
    <link href="Offer.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../Header/header.css" type="text/css" />
    <link rel="stylesheet" href="../Footer/footer.css" type="text/css" />

    <title>CarShare.com | Offer A Ride</title>
</head>

<body>
    <?php
    include '../Header/header.php';
    ?>
    <div id="pagecontainer">
        <div id="pageheader" style="height: 101px; vertical-align: middle;">
            <h1 style="font-size: calc(26px + 1vw);">Creating Your New Ride :</h1>
        </div>
        <form id="createRideForm" action="includes/createRide.inc.php" method="POST">
            <div id="section1">
                <div id="desc">
                    <p>Help us set up <br /> your trip !</p>
                </div>
                <div id="firstform">
                    <span>Traject Info :</span>
                    <div id="inputsContainer">

                        <div id="inputs" style="width: 100%;">
                            <div style="white-space: nowrap;">
                                <input name ="from" type="text" class="input auto" placeholder="from" id="from" required><i
                                    class="fas fa-map-marker-alt InputIcons"></i>
                            </div>
                            <div style="white-space: nowrap;">
                                <input type="text" name ="to" class="input auto" placeholder="to" id="to" required><i
                                    class="fas fa-map-marked-alt InputIcons"></i>
                            </div>
                            <div style="white-space: nowrap;">
                                <input name ="hour" type="time" class="input" placeholder="hh:mm" id="hour" required><i
                                    class="fas fa-clock InputIcons"></i>
                            </div>
                            <div style="white-space: nowrap;">
                                <input name ="day" type="date" class="input" id="date" min="" max="" required><i class="fas fa-calendar InputIcons"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div id="section2">
                <div id="repeatORNOTrepeat">
                    <span id="checkspan"
                        style="padding : 10px; font-weight: 600; font-size: calc(14px + 1vw); font-family: 'museo-sans-rounded',sans-serif; z-index: 20; color: white; position: absolute; width: 100%; text-align: center;">will
                        this ride occure more than once ?</span>
                    <span class="switcher">
                        <input name="reps" type="checkbox" id="switcher">
                        <label  for="switcher"></label>
                    </span>
                </div>
                <div id="repeat">
                    <table
                        style="border: 0; border-right:solid; border-width: 2px; -webkit-border-image: -webkit-linear-gradient(bottom, rgba(0, 0, 0, 0) 1%, #97caf5 50%, rgba(0, 0, 0, 0) 100%) 0 100% 0 0/0 3px 0 0 stretch;">
                        <tr>
                            <th style="padding-top: 13px;">
                                <h2 style="font-size: calc(10px + 1vw);">This ride will occure every :</h2>
                            </th>
                            <td>
                                <div class="checkbox-group" id="checkboxes">
                                    <ul>
                                        <li>
                                            <input name ="days[]" type="checkbox" id="mon" value="MON" />
                                            <label for="mon">MON</label>
                                        </li>
                                        <li>
                                            <input name ="days[]" type="checkbox" id="tue" value="TUE" />
                                            <label for="tue">TUE</label>
                                        </li>
                                        <li>
                                            <input name ="days[]" type="checkbox" id="wed" value="WED" />
                                            <label for="wed">WED</label>
                                        </li>
                                        <li>
                                            <input name ="days[]" type="checkbox" id="thu" value="THU" />
                                            <label for="thu">THU</label>
                                        </li>
                                        <li>
                                            <input name ="days[]" type="checkbox" id="fri" value="FRI" />
                                            <label for="fri">FRI</label>
                                        </li>
                                        <li>
                                            <input name ="days[]" type="checkbox" id="sat" value="SAT" />
                                            <label for="sat">SAT</label>
                                        </li>
                                        <li>
                                            <input name ="days[]" type="checkbox" id="sun" value="SUN" />
                                            <label for="sun">SUN</label>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                    </table>

                    <div id="until">
                        <label id="untilLabel" for="expDate"
                            style="font-weight: 600; padding: 10px; font-size: calc(10px + 1vw); font-family: 'museo-sans-rounded',sans-serif;">This
                            ride will be repeated until : </label>
                        <input type="date" name="expDate" id="expDate">
                    </div>
                </div>
            </div>-->

            <div id="section3">
                <span style="width : 100%;">More specifications : </span>
                <div style="width: 100%;         margin-bottom: 15px;">
                    <label for="nbrPlaces">Number of free seats in the vehicle (not including driver's) :</label>
                    <input type="number" placeholder="1 to 200" name="nbrPlaces" min="1" max="200" id ="nbrPlaces" required>
                </div>
                <div style="width: 100%;         margin-bottom: 15px;">
                    <label for="model">vehicle :</label>
                    <input type="text" placeholder="model" name="model" maxlength="50" id="model">
                </div>
                <div style="width: 100%;         margin-bottom: 15px;">
                    <div style="width: 100%;         margin-bottom: 15px;">
                        <label for="RideSpecs">additional information :</label>
                    </div>
                    <textarea id="RideSpecs" name ="tripDescription" placeholder="About me and my vehicle... " maxlength="560" name="RideSpecs"
                        style=" background :rgba(255, 255, 255, 0.651); border-width : 3px ; border-image:linear-gradient(45deg,rgb(160, 200, 238),rgb(9, 109, 202)) 3; height: 200px; width: 95%; margin-left: 10px; font-size: 1.2rem; font-weight: 600; font-family: 'museo-sans-rounded',sans-serif;"></textarea>
                </div>
                <div id="checkmarks">
                    <div class="check">

                        <label class="customCheckMark" id="music">

                            <input type="checkbox" class="checkbox" id="musicBox" name="musiccheckbox" checked>
                            <div class="checkMark"></div>
                            <span>I don't mind music<i class="fas fa-music note" id="note"></i></span>

                        </label>

                    </div>
                    <div class="check">

                        <label class="customCheckMark">

                            <input type="checkbox" class="checkbox" id="animalBox" name="animalcheckbox" checked>
                            <div class="checkMark"></div>
                            <span>I don't mind Animals<i class="fas fa-paw animals" id="animals"></i></span>

                        </label>

                    </div>
                    <div class="check">

                        <label class="customCheckMark">

                            <input type="checkbox" class="checkbox" id="smokingBox" name="smokingcheckbox" checked>
                            <div class="checkMark"></div>
                            <span>I don't mind Smoking<i class="fas fa-smoking cigarette" id="cigarette"></i></span>

                        </label>

                    </div>
                    <div class="check">

                        <label class="customCheckMark">

                            <input type="checkbox" class="checkbox" id="luggageBox" name="luggagecheckbox" checked>
                            <div class="checkMark"></div>
                            <span>I have space for your luggage <i class="fas fa-suitcase luggage" id="luggage"></i></span>
                        </label>
                    </div>

                </div>
<div style="margin-top: 5%">
<input type="number" id="price" placeholder ="price" name="price" min="1" step="1">
<label>DA/Seat</label>
</div>
                <div id="ButtonContainer">

<button type="submit" id="SubmitButton" name="submit">Create Ride</button>

</div>
<?php
if (isset($_GET["error"])){
                    if ($_GET["error"] == "sameLocations"){
                        echo"<p style ='color: red;' class=\"probleme\">starting point and destination can't be the same</p>";
                    }else if ($_GET["error"] == "existingRide"){
                        echo"<p style ='color: red;' class=\"probleme\">you have already created this ride</p>";
                    }else if ($_GET["error"] == "emptyInput"){
                        echo"<p class=\"probleme\">Fill in all required fields!</p>";
                    }
                }
?>
            </div>
        </form>
    </div>
    <?php
    include '../Footer/footer.php'
    ?>
    <script src="../Header/header.js"></script>
    <script src="Offer.js"></script>
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
</body>

</html>