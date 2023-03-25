<?php
$page_title = "Login";
include "./includes/header.php";
?>

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
        $data = json_decode(file_get_contents('data.json'), true);

        if (is_array($data)) {
            $message = "User not found";
            foreach ($data as $key => $value) {
                if ($value['username'] == $_POST['username'] && $value['password'] == $_POST['password']) {

                    $_SESSION['data'] = $value;
                    $_SESSION['username'] = $username;
                    header("location: dashboard.php");
                } else {
                    $message = "Password does not match";
                }
            }
        } else {
            $message = "User not found";
        }
    }
}
?>

<div>
    <?php
        if (isset($message)) {
            echo "$message";
        }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" name="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password">

        <input type="submit" class="btn" name="submit" value="Login">
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
        <!-- <span><a href="#">Forgot password?</a></span> -->
    </form>
</div>

<?php

    include "./includes/footer.php";
?>