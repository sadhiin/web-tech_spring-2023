<?php
session_start();
$page_title = "Login";
$formWidth = "400px";
include "./includes/header.php";
?>

<script>
    function validateForm() {
        let username = document.getElementById("username");
        let password = document.getElementById("password");

        if (username.value === "") {
            alert("Username is required");
            username.focus();
            username.style.borderColor = "red";
            return false;
        }

        if (password.value === "") {
            alert("Password is required");
            password.style.borderColor = "red";
            password.focus();
            return false;
        }
        return true;
    }
</script>

<?php
$username = $password = $message = "";
$usernameErr = $passwordErr = "";
$isValid = true;

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
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
        $data = getUserbyUsename($username);

        if (is_array($data)) {
            foreach ($data as $k => $v) {
                if ($v['pass'] == $password) {
                    $_SESSION['data'] = $v;
                    $_SESSION['username'] = $username;
                    header("Location: dashboard.php");
                } else {
                    $message = "Password does not match";
                }
            }
        } else {
            echo "User not found";
        }
    }
}
?>

<div>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validateForm()">
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" name="username" id="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password" id="password">
        <?php if (isset($message)) {
            echo $message . "<br>";
        } ?>
        <input type="submit" class="btn" name="submit" value="Login">
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        <span><a href="./forgotPassword.php">Forgot password?</a></span>
    </form>
</div>

<?php

include "./includes/footer.php";
?>