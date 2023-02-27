<?php
if(!isset($_COOKIE['status'])) {
    echo '<script>alert("You are not logged in!")</script>';
    exit();
}

?>
<fieldset>
    <form action="" method="post">
        <legend>PROFILE PICTURE</legend>
        <img width="150px" src="profile_pic.png" alt="">
        <input type="file" name="pic" id="">
        <hr>
        <input type="submit" name="submit" value="Submit">
    </form>
</fieldset>