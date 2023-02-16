<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .login {
            margin-top: 50px;
            width: 500px;
            height: 400px;
            background-color: coral;
            border-radius: 5px;
        }

        .formlogin {
            padding: 5px;
        }

        fieldset {
            background-color: #eeeeee;
        }

        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <!-- validation Rules -->
    <?php
    // function to cleaning and triming the form input
    function take_input($d)
    {
        $d = trim($d);
        $d = stripcslashes($d);
        $d = htmlspecialchars($d);
        return $d;
    }
    $username = $usernameErr = $pass = $passErr = "";
    // user name validaton
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "User name required";
        } else {
            $username = $_POST["username"];
            if ((!preg_match("/^[a-zA-Z0-9]+(?:[\w -]*[a-zA-Z0-9]+)*$/", $username)) && strlen($username) > 2) {
                $usernameErr = "Only Alpha numaric and space and dash allowed";
            }
        }
        // password validaton

        if (empty($_POST['pass'])) {
            $passErr = "Password can not be empty.";
        } else {
            $pass = $_POST['pass'];
            if (!preg_match("/^(?=.*[A-Za-z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $pass)) {
                $passErr = "Passwoed must contain spacial carecter [@,!,#,$,%]";
            }
        }
    }


    ?>


    <center>
        <div class="login">
            <!-- <p><span class="error">* required field</span></p> -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="formlogin" method="POST">
                <fieldset>
                    <legend>Login</legend>
                    <label for="username">User Name: </label>
                    <input type="text" name="username" id="username">
                    <span class="error">*
                        <?php echo $usernameErr; ?>
                    </span>

                    <br><br>
                    <label for="password">Password: </label>
                    <input type="password" name="pass" id="pass">
                    <span class="error">*
                        <?php echo $passErr; ?>
                    </span>

                    <br>
                    <input type="checkbox" name="remember" id="remember" value="rememberuser">
                    <label for="remember">Remember Me</label>
                    <br><br>
                    <input type="submit" value="submit"><br>
                    <a href="changePassword.php" target="_blank" rel="Change Password">
                        Forget Passowrd.
                    </a>

                </fieldset>
            </form>
        </div>
    </center>
</body>

</html>