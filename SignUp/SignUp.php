<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp | CarShare.com</title>
    <link rel="stylesheet" href="SignUp.css">
    <link rel="stylesheet" href="build/css/intlTelInput.css">

</head>

<body>

    <div id="Box">

        <div id="backPanel">

            <div id="Logo"></div>
            <div id="Description">
                <h1>RIDESHARING FOR EVERYONE</h1>
                <p>Are you driving? Tell us where you are going!<br/> Together, let's move millions of people around.</p>
            </div>
        </div>

        <div id="SignUpFormBox"> 

            <form id="SignUpForm" action="includes/SignUp.inc.php" method="POST">

                <div id="h1wrap">

                    <h1>SignUp</h1>
                    <p id = "SignUpForm_p">Already a mamber ? <a href ="../Login/Login.php">LogIn to your account</a> </p>

                </div>
                <div id="FN">
                    <input type="text" value="" id="FirstName" name="firstName" placeholder="FirstName" class="form_field" onchange="this.setAttribute('value', this.value);" required>
                    <label for="FirstName" class="form__label">FirstName</label>
                   
                </div>

                <div id="LN">
                    
                    <input type="text" value="" id="LastName" name="lastName" placeholder="LastName" class="form_field" onchange="this.setAttribute('value', this.value);" required>
                    <label for="LastName" class="form__label">LastName</label>

                </div>

                <div id="BD">
                    
                    <label for="birthday">Date of birth :</label>
                    <input type="date" id="birthday" name="birthday" min="1903-01-02" max="2007-12-31" required>

                </div>

                <label for="MF" id="MFL">Gender : </label>

                <div id="MF">

                    <label for="Male" class="radioLabel">
                        <input type="radio" id="Male" name="gender" value="Male" required>
                        <span class="label">Male</span>
                    </label>
                    
                    <label for="Female" class="radioLabel">
                        <input type="radio" id="Female" name="gender" value="Female" required>
                        <span class="label">Female</span>
                    </label>

                </div>

                <div id="EM">
                    <input type="email" value="" id="email" name="email" placeholder="E-mail" class="form_field" onchange="this.setAttribute('value', this.value);" required>
                    <label for="email" class="form__label">E-mail</label>
                </div>

                <div id="pass">
                    
                    <input type="Password" value="" name="Password" id="Password" placeholder="Password" class="form_field" onchange="this.setAttribute('value', this.value);" required>
                    <label for="Password" class="form__label">Password</label> 

                </div>

                <div id = "PN">
                    <label for="phone" id="phone_label">Phone Number :</label>
                    <input type="tel" name="full_phone" id="phone" value="" onchange="this.setAttribute('value', this.getValue());"/>
                </div>

                <div id="ButtonContainer">

                    <button type="submit" id="SubmitButton" name="submit">SignUp</button>

                </div>
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "invalidFirstName"){
                        echo"<p class=\"probleme\">FirstName is invalid</p>";
                    }else if ($_GET["error"] == "invalidLastName"){
                        echo"<p class=\"probleme\">LastName is invalid</p>";
                    }else if ($_GET["error"] == "invalidEmail"){
                        echo"<p class=\"probleme\">Email is invalid</p>";
                    }else if ($_GET["error"] == "existingEmail"){
                        echo"<p class=\"probleme\">Email already exists</p>";
                    }else if ($_GET["error"] == "emptyInput"){
                        echo"<p class=\"probleme\">Fill in all required fields!</p>";
                    }
                }
            ?>     
            </form>

        </div>
    </div>
    <script src="build/js/intlTelInput.js"></script>
  <script>
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
      utilsScript: "build/js/utils.js",
    });
    
    
  </script>
</body>
</html>