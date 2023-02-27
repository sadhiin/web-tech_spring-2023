<?php

function checkLogin(){


    if(!isset($_COOKIE['username']) || !isset($_COOKIE['password'])) {
        return false;
    }

    if($_POST['username'] == null || $_POST['password'] == null) {
        echo '<script>alert("Fill all the fields")</script>';
        return false;
    }

    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    if ($_POST['username'] == $username && $_POST['password'] == $password) {

        if(isset($_POST['remember'])) {
            setcookie('autologin', 'true', time() + (86400 * 30), "/");
        }
        setcookie('status', 'true', time() + (86400 * 30), "/");
        return true;
    }
    else {
        return false;
    }
}