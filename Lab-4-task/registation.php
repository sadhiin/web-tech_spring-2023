<?php

if(isset($_REQUEST['submit'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $cpassword = $_REQUEST['cpassword'];
    $gender = $_REQUEST['gender'];
    $dd = $_REQUEST['dd'];
    $mm = $_REQUEST['mm'];
    $yyyy =  $_REQUEST['yyyy'];

    if($username != null &&
       $password != null &&
       $email != null &&
       $name != null &&
       $cpassword != null &&
       $gender != null &&
       $dd != null &&
       $mm != null &&
       $yyyy != null
       ) {

        if ($cpassword == $password) {
            $account = [
                'name' => $name,
                'email' => $email,
                'username' => $username,
                'password' => $password,
                'gender' => $gender,
                'dd' => $dd,
                'mm' => $mm,
                'yyyy' => $yyyy
            ];
            $_SESSION['account'] = $account;

            foreach($account as $key => $value) {
                setcookie($key, $value, time() + (86400 * 30), "/");
            }

            setcookie('status', 'true', time() + (86400 * 30), "/");

            header('location: logged_in_dashboard.php');
        }
        else {
            echo '<script>alert("Password does not match!")</script>';
        }

    } else {
        echo '<script>alert("Fill all the fields")</script>';
    }
}