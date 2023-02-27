<?php
if(!isset($_COOKIE['status'])) {
    echo '<script>alert("You are not logged in!")</script>';
    exit();
}

if($_SESSION['account']['mm'] < 9 && $_SESSION['account']['dd'] > 9) {
    $dob = $_SESSION['account']['yyyy'] . '-0' . $_SESSION['account']['mm'] . '-' . $_SESSION['account']['dd'];
}

else if($_SESSION['account']['mm'] > 9 && $_SESSION['account']['dd'] < 9) {
    $dob = $_SESSION['account']['yyyy'] . '-' . $_SESSION['account']['mm'] . '-0' . $_SESSION['account']['dd'];
}

else if($_SESSION['account']['mm'] < 9 && $_SESSION['account']['dd'] < 9) {
    $dob = $_SESSION['account']['yyyy'] . '-0' . $_SESSION['account']['mm'] . '-0' . $_SESSION['account']['dd'];
}
else {
    $dob = $_SESSION['account']['yyyy'] . '-' . $_SESSION['account']['mm'] . '-' . $_SESSION['account']['dd'];
}

if(isset($_REQUEST['submitUpdate'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $gender = $_REQUEST['gender'];
    $dob = $_REQUEST['dob'];

    if($name != null &&
       $email != null &&
       $gender != null &&
       $dob != null) {


        setcookie('name', $name, time() + (86000 * 30), "/");
        setcookie('email', $email, time() + (86000 * 30), "/");
        setcookie('gender', $gender, time() + (86000 * 30), "/");
        // setcookie('dob', $dob, time() + (86000 * 30), "/");
        header('location: public_home.php');
       }
}

?>

<fieldset id="reg">
    <legend>PROFILE</legend>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td>Name</td>
                <td>: <input type="text" name="name" value="<?=$_SESSION['account']['name']?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: <input type="email" name="email" value="<?=$_SESSION['account']['email']?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>

            <tr>
                <td>Gender</td>
                <td>
                    <label for="gender">
                        <input type="radio" name="gender" value="Male"
                            <?php echo ($_SESSION['account']['gender'] == "Male" ? "checked" : "") ?>>Male
                        <input type="radio" name="gender" value="Female"
                            <?php echo ($_SESSION['account']['gender'] == "Female" ? "checked" : "") ?>>Female
                        <input type="radio" name="gender" value="Other"
                            <?php echo ($_SESSION['account']['gender'] == "Other" ? "checked" : "") ?>>Other
                    </label>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    Date of Birth
                </td>
                <td>
                    : <input type="date" name="dob" value="<?=$dob?>">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submitUpdate" value="Submit"></td>
            </tr>
        </table>
    </form>
</fieldset>