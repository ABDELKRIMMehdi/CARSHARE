<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Website</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <div id="Box">

        <div id="backPanel">

            <div id="Logo"></div>
            <div id="Description">
                <h1>RIDESHARING FOR EVERYONE</h1>
                <p>Are you driving? Tell us where you are going!<br /> Together, let's move millions of people around.
                </p>
            </div>
        </div>

        <div id="SignInFormBox">

            <form id="SignInForm" action="includes/Login.inc.php" method="POST">

                <div id="h1wrap">

                    <h1>LOG IN</h1>
                    <p id="SignInForm_p">Not a member ? <a href="../SignUp/SignUp.php">Register now</a> </p>

                </div>

                <div id="EM">
                    <input type="email" value="" id="email" name="email" placeholder="E-mail" class="form_field"
                        onchange="this.setAttribute('value', this.value);" required>
                    <label for="email" class="form__label">E-mail</label>
                </div>

                <div id="pass">

                    <input type="Password" value="" name="Password" id="Password" placeholder="Password"
                        class="form_field" onchange="this.setAttribute('value', this.value);" required>
                    <label for="Password" class="form__label">Password</label>

                </div>

                <div id="ButtonContainer">

                    <button type="submit" id="SubmitButton" name="submit">LogIn</button>

                </div>

                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "WrongPassword"){
                        echo"<p class=\"probleme\">Password is incorrect</p>";
                    }else if ($_GET["error"] == "EmailNotFound"){
                        echo"<p class=\"probleme\">Email does not exist</p>";
                    }else if ($_GET["error"] == "emptyInput"){
                        echo"<p class=\"probleme\">Fill in all required fields!</p>";
                    }
                }
            ?>


            </form>
        </div>
    </div>
</body>

</html>