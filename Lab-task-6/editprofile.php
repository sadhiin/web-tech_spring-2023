<?php
session_start();
$page_title = "Dashboard";
$formWidth = "800px";

if (isset($_SESSION['username'])) {
    include "./includes/header_login.php";
} else {
    header("Location: login.php");
}
?>


<?php

$name = $email = $username = $gender = $dob = "";
$nameErr = $emailErr = $usernameErr = $genderErr = $dobErr = $message = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "GET") {


    #----- Name -----#
    if (!isset($_GET['name']) || empty($_GET['name'])) {
        $nameErr = "Name is required";
        $isValid = false;
    } else {
        $name = $_GET['name'];
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters, whitespaces, - and ' are acceptable";
            $isValid = false;
        } else if (str_word_count($name) < 2) {
            $nameErr = "Name has to contain at least two words ";
            $isValid = false;
        }
    }

    #----- Email -----#
    if (!isset($_GET['email']) || empty($_GET["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = $_GET["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }
    }

    #----- User Name -----#
    if (!isset($_GET['username']) || empty($_GET['username'])) {
        $usernameErr = "User Name is required";
        $isValid = false;
    } else {
        $username = $_GET['username'];
        if (!preg_match("/^[a-zA-Z-0-9' ]*$/", $username)) {
            $usernameErr = "Only letters and white space are allowed";
            $isValid = false;
        } elseif (str_word_count($username) > 1) {
            $usernameErr = "User Name has to contain one word";
            $isValid = false;
        }
    }

    #----- Gender -----#
    if (!isset($_GET['gender']) || empty($_GET['gender'])) {
        $genderErr = "Gender is required";
        $isValid = false;
    } else {
        $gender = $_GET['gender'];
    }

    #----- Date of Birth -----#
    if (!isset($_GET['dob']) || empty($_GET['dob'])) {
        $dobErr = "Date of Birth is required";
        $isValid = false;
    } else {
        $dob = $_GET['dob'];
    }

    if ($isValid) {
        $data = [
            'name'            => $_GET['name'],
            'email'            => $_GET['email'],
            'username'         => $_SESSION['data']['username'],
            'password'         => $_SESSION['data']['password'],
            'gender'             => $_GET['gender'],
            'dob'             => $_GET['dob'],
            'img_path'     => $_SESSION['data']['img_path']
        ];
        updateProfile($data);
    }
}

?>
<div>
    <fieldset>
        <form>
            <div>
                <table>
                    <tr>
                        <td style="width: 300px;">
                            <label><b>Account</b></label>
                            <hr> <br>
                            <ul>
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li><a href="viewprofile.php">View Profile</a></li>
                                <li><a href="editprofile.php">Edit Profile</a></li>
                                <li><a href="changeprofilepicture.php">Change Profile Picture</a></li>
                                <li><a href="changepassword.php">Change Password</a></li>
                                <li><a href="Logout.php">Logout</a></li>
                            </ul>
                        </td>

                        <td>
                            <fieldset style="width:600px;">
                                <legend>
                                    <h2>Edit Profile</h2>
                                </legend>
                                <table>
                                    <tr>
                                        <td>Name</td>
                                        <td></td>
                                        <td><input type="text" name="name" value="<?= $_SESSION['data']['name'] ?>"><span style="color:red"><?php echo $nameErr ?></span></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td>
                                        <br>
                                        <td></td>
                                        <td><input type="text" name="email" value="<?= $_SESSION['data']['email'] ?>">
                                            <span style="color:red;">
                                                <?php echo $emailErr ?>
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Gender</td>
                                        <td></td>
                                        <td>
                                            <input <?php if ($_SESSION['data']['gender'] == 'male') {
                                                        echo 'checked="checked"';
                                                    } ?> type="radio" name="gender" value="male" id="male"> <label for="male">Male</label>
                                            <input <?php if ($_SESSION['data']['gender'] == 'female') {
                                                        echo 'checked="checked"';
                                                    } ?> type="radio" name="gender" value="female" id="female"> <label for="female">Female</label>
                                            <input <?php if ($_SESSION['data']['gender'] == 'other') {
                                                        echo 'checked="checked"';
                                                    } ?> type="radio" name="gender" value="other" id="other"> <label for="other">Others</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Date of Birth</td>
                                        <td></td>
                                        <td><input type="date" name="dob" value="<?= $_SESSION['data']['dob'] ?>"><span style="color:red"><?php echo $dobErr ?></span></td>
                                    </tr>

                                </table>
                                <input type="submit" name="submit" value="Submit">
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </fieldset>
</div>

<?php include "./includes/footer.php" ?>