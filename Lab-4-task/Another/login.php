<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
        }

        .container {
            margin: 0 auto;
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #888888;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .cancelbtn {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .cancelbtn:hover {
            background-color: #da190b;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 20%;
            border-radius: 50%;
        }

        .container form {
            margin-top: 20px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 80%;
            }
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>
	<?php
        session_start();

        $username = $password = "";
        $usernameErr = $passwordErr = "";
        $isValid = false;

        if (isset($_SESSION['username'])) {
            // header("location: dashboard.php");
            echo $_SESSION['username'] ." you are loged in.";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (!isset($_POST['uname']) || empty($_POST['uname'])) {
                $usernameErr = "User Name is required";
                $isValid = false;
            } else {
                $username = $_POST['uname'];
            }

            if (!isset($_POST['psw']) || empty($_POST['psw'])) {
                $passwordErr = "Password is required";
                $isValid = false;
            } else {
                $password = $_POST['psw'];
            }

            if ($isValid) {
                $data = json_decode(file_get_contents('data.json'), true);

                if (is_array($data)) {
                    $message = "User not found";

                    foreach ($data as $key => $value) {
                        if ($value['uname'] == $_POST['uname']) {
                            if ($value['psw'] == $_POST['psw']) {
                                $_SESSION['data'] = $value;
                                $_SESSION['username'] = $username;
                                header("location: dashboard.php");
                            } else {
                                $message = "Password does not match";
                            }
                        }
                    }
                } else {
                    $message = "User not found";
                }
            }
        }

    ?>
    <div class="container">
        <h2>Login</h2>
        <div class="imgcontainer">
            <img src="./images/avater.png" alt="Avatar" class="avatar">
        </div>
        <form action="login.php" method="post">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname">
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw">
            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
            <span class="psw"><a href="#">Forgot password?</a></span>
        </form>
    </div>

    <?php

    include_once './includes/footer.php';
    ?>