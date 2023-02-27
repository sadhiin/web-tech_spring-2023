<?php
session_start();

require 'registration.php';
require 'login.php';



$showWelcomeMsg = true;

$welcome = "
            <td colspan=\"3\">
                <h5>Welcome to xCompany</h5>
            </td>
";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Home</title>
</head>

<style>
#border-style {
    border: 1px solid black;
    border-collapse: collapse;
}

#reg {
    display: inline;
}
</style>

<body>

    <table width="100%" id="border-style">
        <tr id="border-style">
            <td align="left">
                <img width="200px" src="logo.svg" alt="logo">
            </td>
            <?php
                $links = file_get_contents('html/public_user_link.html');
                echo $links;
            ?>

        </tr>

        <tr>
            <?php

                if($showWelcomeMsg){
                    $showWelcomeMsg = false;
                    $content = $welcome;
                }
                if(isset($_GET['home'])) {
                    $content = $welcome;
                }
                if(isset($_GET['registration'])) {
                    $content = file_get_contents('html/registration.html');
                }
                if(isset($_GET['login'])) {

                    if(isset($_COOKIE['status'])) {
                        header('location: logged_in_dashboard.php');
                    }
                    $content = file_get_contents('html/login.html');
                }
                if(isset($_GET['forgot_pass'])) {
                    $content = file_get_contents('html/forgot_pass.html');
                }
                if(isset($_REQUEST['submitLogin'])) {


                    if(checkLogin()) {
                        header('location: logged_in_dashboard.php');
                    }
                    else {
                        echo '<script>alert("Invalid username or password")</script>';
                    }
                }

                echo $content;
            ?>
        </tr>

        <tr id="border-style">
            <td colspan="3" align="center">
                Copyright &copy; 2017
            </td>
        </tr>

    </table>

</body>

</html>