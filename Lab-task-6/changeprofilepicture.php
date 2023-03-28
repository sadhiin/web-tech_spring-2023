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


<div>
		<fieldset>
			<form method="post" action="picupload.php" enctype="multipart/form-data">
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
								<fieldset style="width: 400px;">
									<legend><b>Profile Picture</b></legend>

									<img src="<?php echo $_SESSION['data']['img_path']; ?>" height="220px" width="220px"> <br>
									<input type="file" name="file_to_upload" value="Choose a file"> <br>
									<hr> <br>
									<input type="submit" name="submit">

								</fieldset>
							</td>
						</tr>
					</table>
				</div>
			</form>
		</fieldset>
	</div>
<?php include "./includes/footer.php"; ?>