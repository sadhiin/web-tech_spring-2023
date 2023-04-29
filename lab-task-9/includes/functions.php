<?php

function loginVarification()
{
    $username = $password = "";
    $usernameErr = $passwordErr = "";
    $isValid = false;

    if (isset($_SESSION['username'])) {
        // header("location: dashboard.php");
        echo $_SESSION['username'] . " you are loged in.";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!isset($_POST['username']) || empty($_POST['username'])) {
            $usernameErr = "User Name is required";
            $isValid = false;
        } else {
            $username = $_POST['username'];
        }

        if (!isset($_POST['password']) || empty($_POST['password'])) {
            $passwordErr = "Password is required";
            $isValid = false;
        } else {
            $password = $_POST['password'];
        }

        if ($isValid) {
            $data = json_decode(file_get_contents('data.json'), true);

            if (is_array($data)) {
                $message = "User not found";

                foreach ($data as $key => $value) {
                    if ($value['username'] == $_POST['username']) {
                        if ($value['password'] == $_POST['password']) {
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
}
