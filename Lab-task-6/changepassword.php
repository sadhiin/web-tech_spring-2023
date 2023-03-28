<?php
session_start();
$page_title = "Change Password";
$formWidth = "800px";

if (isset($_SESSION['username'])) {
    include "./includes/header_login.php";
} else {
    header("Location: login.php");
}
?>
<?php

$currentpassword = $newpassword = $retypepassword = "";
$currentpasswordErr = $newpasswordErr = $retypepasswordErr = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    #----- Current Password  -----#

    if (!isset($_POST['currentpassword']) || empty($_POST["currentpassword"])) {
        $currentpasswordErr = "Current password is required";
        $isValid = false;
    } else {
        $currentpassword = $_POST["currentpassword"];

        if ($_SESSION['data']['pass'] !== $currentpassword) {
            $currentpasswordErr = "Current password is not match";
            $isValid = false;
        }
    }

    #----- New Password -----#

    if (!isset($_POST['newpassword']) || empty($_POST["newpassword"])) {
        $newpasswordErr = "New password is required";
        $isValid = false;
    } else {
        $newpassword = $_POST["newpassword"];

        if ($newpassword == $currentpassword) {
            $newpasswordErr = "New password should not be same as current password";
            $isValid = false;
        }
    }

    #----- Retype New  -----#
    if (!isset($_POST['retypepassword']) || empty($_POST["retypepassword"])) {
        $retypepasswordErr = "Retype password is required";
        $isValid = false;
    } else {
        $retypepassword = $_POST["retypepassword"];

        if ($retypepassword != $newpassword) {
            $retypepasswordErr = "New Password should be same";
            $isValid = false;
        }
    }

    if ($isValid) {
        if (changePassword($_SESSION['username'], $newpassword)) {
            header('Location: dashboard.php');
        }
        else{
            echo "Issue with password change";
        }
    }
}
?>
<div>
    <fieldset>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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

                        <td class="center">
                            <fieldset>

                                <legend>
                                    <h2>Change Password</h2>
                                </legend>

                                <table>

                                    <tr>
                                        <td>Current Password</td>
                                        <td></td>
                                        <td><input type="password" name="currentpassword" value="<?php echo $currentpassword; ?>">
                                    </tr>

                                    <tr>
                                        <td>New Password</td>
                                        <td></td>
                                        <td><input type="password" name="newpassword" value="<?php echo $newpassword; ?>">
                                            <span style="color:red">
                                                <?php echo $newpasswordErr; ?>
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Retype New Password</td>
                                        <td></td>
                                        <td><input type="password" name="retypepassword" value="<?php echo $retypepassword; ?>">
                                            <span style="color:red">
                                                <?php echo $retypepasswordErr ?>
                                            </span>
                                        </td>
                                    </tr>
                                </table>

                                <hr>

                                <input type="submit" name="submit">

                            </fieldset>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </fieldset>
</div>

<?php include "./includes/footer.php" ?>