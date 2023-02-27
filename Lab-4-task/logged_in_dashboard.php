<?php

session_start();

$showWelcomeMsg = true;

$welcome = "Welcome " . $_COOKIE['name'];
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

            <td align="right">
                Logged in as
                <a href="?view_profile"><?php echo $_COOKIE['name'] ?></a> |
                <a href="logout.php">Logout</a>
            </td>
        </tr>

        <tr>

            <td id="border-style" width="30%">
                <b>Account</b>
                <hr>
                <ul>
                    <li><a href="?dashboard">Dashboard</a></li>
                    <li><a href="?view_profile">View Profile</a></li>
                    <li><a href="?edit_profile">Edit Profile</a></li>
                    <li><a href="?profile_pic">Change Profile Picture</a></li>
                    <li><a href="?change_pass">Change Password</a></li>
                    <li><a href="?logout">Logout</a></li>
                </ul>
            </td>
            <td valign="top">

                <?php
                if ($showWelcomeMsg) {
                    $showWelcomeMsg = false;
                    $content = $welcome;
                }
                if (isset($_GET['dashboard'])) {
                    $content = $welcome;
                }
                if (isset($_GET['view_profile'])) {
                    $content = include 'html/view_profile.php';
                }
                if (isset($_GET['edit_profile'])) {
                    $content = include 'edit_profile.php';
                }
                if (isset($_GET['profile_pic'])) {
                    $content = include 'profile_pic.php';
                }
                if (isset($_GET['change_pass'])) {
                    $content = include 'change_password.php';
                }
                if (isset($_GET['logout'])) {
                    $content = include 'logout.php';
                }

                echo $content;

                ?>
            </td>
        </tr>

        <tr id="border-style">
            <td colspan="3" align="center">
                Copyright &copy; 2017
            </td>
        </tr>

    </table>

</body>

</html>