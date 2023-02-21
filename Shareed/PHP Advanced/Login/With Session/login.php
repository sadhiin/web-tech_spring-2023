
<?php 
	session_start();

	$username = "admin";
	$password = "admin";

	if (isset($_POST['uname'])) {
		if ($_POST['uname']==$username && $_POST['pass']==$password) {
			$_SESSION['uname'] = $username;
			header("location:welcome.php");
		}
		else{
			$msg = "username or password invalid";
		}
	}
 ?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<span><?php
		if (isset($msg)) {
			echo $msg;
		}

	 ?>	 	
	 </span>
	 <br>
	Username:
	<input type="text" name="uname">
	<br>
	Password:
	<input type="password" name="pass">
	<br>
	<br>
	<input type="submit" name="login" value="Login">

</form>