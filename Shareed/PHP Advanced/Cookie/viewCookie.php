<?php 
	
	if (isset($_COOKIE['student'])) {
		echo $_COOKIE['student'];
	}else{
		echo "Cookie not set";
	}

 ?>
 <a href="createCookie.php">Create</a>
