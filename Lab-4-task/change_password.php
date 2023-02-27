<?php
if (!isset($_COOKIE['status'])) {
    echo '<script>alert("You are not logged in!")</script>';
    exit();
}

if (isset($_REQUEST['submitPass'])) {
    $currPass = $_REQUEST['currPassword'];
    $nPass = $_REQUEST['nPassword'];
    $renPass = $_REQUEST['renPassword'];

    if ($currPass == null || $nPass == null || $renPass == null) {
        echo '<script>alert("Fill all the fields")</script>';
    }

    if ($nPass != $renPass) {
        echo '<script>alert("New password does not match!")</script>';
    }

    if ($currPass != $_COOKIE['password']) {
        echo '<script>alert("Current password is incorrect!")</script>';
    }

    if ($nPass == $_COOKIE['password']) {
        echo '<script>alert("New password is same as current password!")</script>';
    }

    if ($currPass == $_COOKIE['password']) {
        if ($nPass == $renPass) {
            setcookie('password', $nPass, time() + (86400 * 30), "/");
            echo '<script>alert("Password changed successfully!")</script>';
        }
    }
}
?>
<fieldset>
    <legend>CHANGE PASSWORD</legend>
    <form action="" method="post">
        <table>
            <tr>
                <td>Current Password</td>
                <td>
                    : <input type="password" name="currPassword" id="">
                </td>
            </tr>

            <tr>
                <td style="color: green">New Password</td>
                <td>
                    : <input type="password" name="nPassword" id="">
                </td>
            </tr>

            <tr>
                <td style="color: red">Retype New Password</td>
                <td>
                    : <input type="password" name="renPassword" id="">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submitPass" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</fieldset>