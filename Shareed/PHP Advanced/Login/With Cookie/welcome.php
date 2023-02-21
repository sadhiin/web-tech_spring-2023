<?php 

	if (!empty($_POST['remember'])) {
		setcookie("username", $_POST['uname'], time()+10);
		setcookie("password", $_POST['pass'], time()+10);
		setcookie("color", "red", time()+10);
		echo "Cookie set successfully";
		
	}else{
		setcookie("username", "");
		setcookie("password", "");
		echo "Cookie not set";

	}

 ?>
 <br>
 <a href="login.php">Go back to login</a>