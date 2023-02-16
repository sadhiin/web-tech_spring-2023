<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password.</title>
    <style>
        .changepassword {
            margin-top: 50px;
            width: 500px;
            height: 400px;
            background-color: coral;
            border-radius: 5px;
        }

        .formchangepass {
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

    <?php
    $currpass = $newpass = $curpassErr = $passErr = $retype = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // User must be loged in to the system.

            if(empty($_POST['curpass'])){
                $curpassErr = "Current password can't be empty";
            }
            else{
                // we have to verify the user.
            }

            if(empty($_POST['newpass'])){
                $passErr = "New password can't be empty";
            }
            else{
                $newpass = $_POST['newpass'];
                if($newpass == $currpass){
                    $passErr = "New password should be differnet the current password";
                }
                if (!preg_match("/^(?=.*[A-Za-z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $newpass)) {
                    $passErr = "Passwoed must contain spacial carecter [@,!,#,$,%]";
                }
            }

            if(empty($_POST["repass"])){
                $retype = "Retyped password can not be empty";
            }
            else{
                if($_POST["repass"] != $_POST["newpass"]){
                    $retype = "Password don't match";
                }
            }
        }
    ?>
    <center>
        <div class="changepassword">
            <!-- <p><span class="error">* required field</span></p> -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="formchangepass">
                <fieldset>
                    <legend>CHANGE PASSWORD</legend>

                    <label for="password">Current Password: </label>
                    <input type="password" name="curpass" id="curpass">
                    <span class="error">*
                        <?php echo $curpassErr; ?>
                    </span>

                    <br>
                    <br>
                    <label for="password">New Password: </label>
                    <input type="password" name="newpass" id="newpass">
                    <span class="error">*
                        <?php echo $passErr; ?>
                    </span>

                    <br>
                    <br>
                    <label class= "error" for="password">Retype Password: </label>
                    <input type="password" name="repass" id="repass">
                    <span class="error">*
                        <?php echo $retype; ?>
                    </span>

                    <br>
                    <br>
                    <input type="submit" value="submit"><br>
                </fieldset>
            </form>
        </div>
    </center>
</body>

</html>