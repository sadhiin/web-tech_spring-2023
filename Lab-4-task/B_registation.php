<?php
session_start();
$pageTitle = "Registation Page";
$islogedin = false;
include "./include/header.php";
echo "<hr>";

if (isset($_SESSION['logedin'])) {
    header("Location: E_dashboard.php");
    exit();
}
// could be a issue to arise.
?>
<style>
    .reg {
        width: 500px;
        background-color: #78858B;
        border-radius: 8px;
    }

    .inp-aline {
        /* padding-left: 30px; */
        margin-left: 70px;
    }

    .error {
        color: #FF0000;
    }
</style>

<?php
// validating the input data
function take_input($d)
{
    $d = trim($d);
    $d = stripcslashes($d);
    $d = htmlspecialchars($d);
    return $d;
}
$message = '';
$error = '';
$name = $email = $username = $pass = $dob = $gender = "";
$nameErr = $emailErr = $usernameErr = $passErr = $doberr = $genderErr = "";

$canStore = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // name vaidation
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
    } else {
        $name = take_input($_POST['name']);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only latters and space is allowed.";
        }
    }
    // Email validation

    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = take_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // user name validaton
    if (empty($_POST["username"])) {
        $usernameErr = "User name required";
    } else {
        $username = $_POST["username"];
        if ((!preg_match("/^[a-zA-Z0-9]+(?:[\w -]*[a-zA-Z0-9]+)*$/", $username)) && strlen($username) > 2) {
            $usernameErr = "Only Alpha numaric and space and dash allowed";
        }
    }
    // password validaton
    if (empty($_POST['pass'])) {
        $passErr = "Password should not be empty.";
    } else {
        $pass = $_POST['pass'];

        if (!preg_match("/^(?=.*[A-Za-z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $pass)) {
            $passErr = "Passwoed must contain spacial carecter [@,!,#,$,%]";
        }
        if (empty(take_input($_POST["conpass"]))) {
            $passErr = "Confirm passworkd should not be empty.";
        }
        if ($pass != take_input($_POST["conpass"])) {
            $passErr = "Confirm password doesnot match.";
        }
    }

    if (empty($_POST['dob'])) {
        $doberr = "Data is REQUIRED";
    } else {
        $dob = take_input($_POST['dob']);
        $day = (int) substr($dob, -2);
        $m = (int) substr($dob, -5, -3);
        if ($day > 31 || $m > 12) {
            $doberr = "Invalid Date";
        }
    }
    // Gender validation
    if (empty($_POST["gen"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = $_POST["gen"];
        // echo "here is gender " . $gender . "<br>";
    }
    if (empty($nameErr) and empty($emailErr) and empty($usernameErr) and empty($passErr) and empty($genderErr) and empty($doberr)) {
        $canStore = true;
    }
}
?>
<?php
// storing data

if ($canStore == true) {
    if (file_exists("data.json")) {
        $current_data = file_get_contents('data.json');
        $array_data = json_decode($current_data, true);
        // creating new assosiative array from the user input.
        $new_data = array(
            'name' => $_POST['name'],
            'e-mail' => $_POST["email"],
            'username' => $_POST["username"],
            "password" => $_POST['pass'],
            'gender' => $_POST["gender"],
            'dob' => $_POST["dob"]
        );
        $array_data[] = $new_data; // appedning the newly data to the back of previous data.
        $final_data = json_encode($array_data);
        if (file_put_contents('data.json', $final_data)) {
            $message = "Record is stored.";
        }
    } else {
        $error = 'JSON File not exits';
    }
}


?>

<!-- <center> -->
<div class="reg">
    <form method="post">
        <p><span class="error">* required field</span></p>
        <fieldset>
            <legend>Registration</legend>
            Nmae:
            <input class="inp-aline" type="text" name="name" id="name">
            <span class="error">*
                <?php echo $nameErr; ?>
            </span>
            <hr>
            Email:
            <input class="inp-aline" type="text" name="email" id="email">
            <hr>
            User Name:
            <input type="text" name="username" id="username">
            <span class="error">*
                <?php echo $emailErr; ?>
            </span>
            <hr>
            Password:
            <input class="inp-aline" type="password" name="pass" id="pass">
            <hr>
            Confirm Password:
            <input type="password" name="conpass" id="conpass">
            <hr>
            <fieldset>
                <legend>Gender</legend>
                <input type="radio" name="gender" id="male" value="male">
                <label for="male">Male</label>
                <input type="radio" name="gender" id="female" value="female">
                <label for="female">Female</label>
                <input type="radio" name="gender" id="other" value="other">
                <label for="other">Other</label>
                <span class="error">*
                    <?php echo $genderErr; ?>
                </span>
            </fieldset>
            <hr>
            <fieldset>
                <legend>Date of Birth</legend>
                <input type="date" name="dob" id="dob"> <small>dd/mm/yyyy</small>
                <span class="error">*
                    <?php echo $doberr; ?>
                </span>
            </fieldset>
        </fieldset>
        <hr>
        <button type="submit" name="submit" vlaue="add">Submit</button>
        <button type="reset" name="reset" vlaue="clear">Reset</button>
        <?php
        if (isset($message)) {
            echo "<br>" . '<p style="color:green;">' . $message . "</p><br>";
        }
        if (isset($error)) {
            echo "<br>" . $error . "<br>";
        }
        ?>
    </form>
</div>
<!-- </center> -->