<?php
session_start();
$page_title = "Dashboard";
$formWidth = "600px";

if (isset($_SESSION['username'])) {
    include "./includes/header_login.php";
} else {
    header("Location: login.php");
}
?>
    
<center>
<h1>
    Welcome to dashboard...
</h1>
</center>
<!-- <div class="container">
    <div class="left">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="viewprofile.php">View Profile</a></li>
            <li><a href="editprofile.php">Edit Profile</a></li>
            <li><a href="changeprofilepicture.php">Change Profile Picture</a></li>
            <li><a href="changepassword.php">Change Password</a></li>
            <li><a href="Logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="right">
        <h2>Welcome</h2> <small> <?php echo $_SESSION['data']['name']?></small>
        <br><br><img src="<?= $_SESSION['data']['profilepicpath'] ?>" height="155" width="155">
    </div>
</div> -->

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
							<td class="center" style="width: 1000px; font-size: 30px; text-align: center; vertical-align: text-top;"><b><?php echo $_SESSION['data']['name']; ?></b><br><br><img src="<?= $_SESSION['data']['profilepicpath'] ?>" height="155" width="155"></td>
						</tr>
					</table>
				</div>
			</form>
		</fieldset>
	</div>




<?php
include "./includes/footer.php";
?>