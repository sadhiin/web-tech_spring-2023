<?php
session_start();
$page_title = "Home Page";
$formWidth = "500px";
include_once "./includes/header.php";
include_once "./model/model.php";
?>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        display: flex;
        align-items: center;
    }

    nav {
        margin-left: auto;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    nav ul li {
        margin-left: 20px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
    }

    nav ul li a:hover {
        text-decoration: underline;
    }

    .logo {
        display: flex;
        align-items: center;
    }

    .logo img {
        height: 50px;
        margin-right: 10px;
    }

    form {
        margin: 50px auto;
        width: 300px;
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="password"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    input[type="submit"] {
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #111;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        font-size: 20px;
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
    }

    .btn {
        margin-top: 20px;
        align-self: center;
    }

    .container {
        margin: auto;
        width: 70%;
        padding: 10px;
        background-color: #f2f2f2;
        border-radius: 5px;
    }

    h1 {
        text-align: center;
        font-size: 28px;
        margin-top: 20px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-size: 20px;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        box-shadow: 0px 0px 5px #b3b3b3;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        font-size: 20px;
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
    }

    .btn {
        margin-top: 20px;
        align-self: center;
    }
</style>

<?php
$name = $email = $username = $password = $confirmpassword = $gender = $dob = "";
$nameErr = $emailErr = $usernameErr = $passwordErr = $confirmpasswordErr = $genderErr = $dobErr = $message = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (!isset($_POST['name']) || empty($_POST['name'])) {
        $nameErr = "Name is required";
        $isValid = false;
    } else {
        $name = $_POST['name'];
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters, whitespaces, - and ' are acceptable";
            $isValid = false;
        } else if (str_word_count($name) < 2) {
            $nameErr = "Name has to contain at least two words ";
            $isValid = false;
        }
    }

    if (!isset($_POST['email']) || empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }
    }


    if (!isset($_POST['username']) || empty($_POST['username'])) {
        $usernameErr = "User Name is required";
        $isValid = false;
    } else {
        $username = $_POST['username'];
        if (!preg_match("/^[a-zA-Z-0-9' ]*$/", $username)) {
            $usernameErr = "Only letters and white space are allowed";
            $isValid = false;
        } elseif (str_word_count($username) > 1) {
            $usernameErr = "User Name has to contain one word";
            $isValid = false;
        }
    }

    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $passwordErr = "Password is required";
        $isValid = false;
    } else {
        $password = $_POST['password'];

        if (strlen($password) < 8) {
            $passwordErr = "Password must contain at least 8 characters";
            $isValid = false;
        }
    }

    if (!isset($_POST['confirmpassword']) || empty($_POST['confirmpassword'])) {
        $confirmpasswordErr = "Confirm password is required";
        $isValid = false;
    } else {
        $confirmpassword = $_POST['confirmpassword'];

        if ($password !== $confirmpassword) {
            $confirmpasswordErr = "Password is not match";
            $isValid = false;
        }
    }


    if (!isset($_POST['gender']) || empty($_POST['gender'])) {
        $genderErr = "Gender is required";
        $isValid = false;
    } else {
        $gender = $_POST['gender'];
    }

    if (!isset($_POST['dob']) || empty($_POST['dob'])) {
        $dobErr = "Date of Birth is required";
        $isValid = false;
    } else {
        $dob = $_POST['dob'];
    }

    if ($isValid) {
        $users = getAllUsers();
        foreach ($users as $k => $v) {
            if ($v['name'] == $_POST['name'] and $v['email'] == $_POST['email']) {
                echo "User alredy exist";
                $isValid = false;
            }
        }
    }

    if ($isValid) {
        // Constracting tha assos array.
        $data = [
            'name'            => $_POST['name'],
            'email'            => $_POST['email'],
            'username'         => $_POST['username'],
            'password'         => $_POST['password'],
            'gender'             => $_POST['gender'],
            'dob'             => $_POST['dob'],
            'image'     => 'uploads/profile.png'
        ];
        // checking existing user

        // creating the new user
        if (createUser($data)) {
            echo "Successfully user added.";
        } else {
            echo "Can not create user";
        }
    }
}
?>

<div class="container">
    <h1>Registration Form</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="fname">First Name</label>
        <input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>"><span style="color:red"><?php echo $nameErr ?></span>


        <label for="email">Email</label>
        <input type="text" placeholder="Your Email address" name="email" value="<?php echo $email; ?>"><span style="color:red"><?php echo $emailErr ?></span>

        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>"><span style="color:red"><?php echo $usernameErr ?></span>

        <label for="password">Password</label>
        <input type="password" name="password" value="<?php echo $password; ?>"><span style="color:red"><?php echo $passwordErr ?></span>

        <label for="confirmpassword">Confirm Password</label>
        <input type="password" name="confirmpassword" value="<?php echo $confirmpassword; ?>"><span style="color:red"><?php echo $confirmpasswordErr ?></span>

        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="Male" id="Male"> Male
        <input type="radio" name="gender" value="Female" id="Female">Female
        <input type="radio" name="gender" value="Other" id="Other">Other<span style="color:red"><?php echo $genderErr ?></span>

        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" value="<?php echo $dob; ?>"><span style="color:red"><?php echo $dobErr ?></span>

        <button type="submit" class="btn">Submit</button>
    </form>
</div>


<?php
include "./includes/footer.php";
?>