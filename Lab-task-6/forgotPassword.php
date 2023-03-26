<?php
session_start();
$page_title = "Forgot Password";
if (!isset($_SESSION['username'])) {
    include "./includes/header.php";
} else {
    include "./includes/header_login.php";
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $data = json_decode(file_get_contents('./data.json'), true);
    $found = false;
    if (is_array($data)) {
        foreach ($data as $key => $value) {
            if ($value['email'] == $_POST['email']) {
                echo "<center> Your Password: ".$value['password']. "</center>";
                $found=true;
            }
        }
    }

    if(!$found){
        echo "User not found";
    }
}
?>
<center>
    <div>
        <h1>
            Restore Your Password
        </h1>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <fieldset>
                    <legend>Password Restore</legend>
                    <label for="eamil">Enter email</label>
                    <input type="text" name="email" placeholder="Your email">
                    <input type="submit" name="submit" value="Submit">
                </fieldset>
            </form>
        </div>
    </div>

</center>
<?php
include "./includes/footer.php";
?>