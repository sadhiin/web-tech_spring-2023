
<?php
if(!isset($_COOKIE['status'])) {
    echo '<script>alert("You are not logged in!")</script>';
    exit();
}

?>
<fieldset>
    <legend>PROFILE</legend>
    <form action="" method="POST">
        <table align="center">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                : <?php echo $_COOKIE['name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                : <?php echo $_COOKIE['email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gender
                            </td>
                            <td>
                                : <?php echo $_COOKIE['gender']; ?>
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
                                : <?php echo $_COOKIE['dd']; ?> /
                                <?php echo $_COOKIE['mm']; ?> /
                                <?php echo $_COOKIE['yyyy']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td align="center">
                    <img width="150px" src="profile_pic.png" alt="Profile Picture">
                    <br>
                    <a href="?profile_pic">Change</a>
                </td>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            </tr>
            <tr>
                <td>
                    <a href="?edit_profile">Edit Profile</a>
                </td>
            </tr>
        </table>
    </form>
</fieldset>