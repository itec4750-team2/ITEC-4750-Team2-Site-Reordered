

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Knightly Knowledge</title>
	<link href="stylez.css" rel="stylesheet" />
</head>
<body>

	<header>
		<img src="images/MiddleGeorgia_Inst_EXHoriz_DkBgrnd.jpg" alt="MGA" />
	</header>
	
	<br>
		
	<div id="loginLogo">
		<br><br><br>
		<img src="images/knightly knowledge logo.jpg" alt="Knight" width="35%" />
	</div>

<?php
include ("config.php");

	if (isset($_GET["email"]) && isset($_GET["token"])) {
		//$connection = new mysqli("168.16.222.102","capstone-eval-tool-user","Ca5tN0tJuDgET*3@ch!","capstone-eval-tool");
		
		$email = $connection->real_escape_string($_GET["email"]);
		$token = $connection->real_escape_string($_GET["token"]);
		
		$data = $connection->query("SELECT LoginID FROM login WHERE email='$email' AND token='$token'");
		
		if ($data->num_rows > 0) {
		
			$str = "1234567890qwertyuiopASDFGHJKLMnBvCxZ";
			$str = str_shuffle($str);
			$str = substr($str,0,8);
			
			$password = sha1($str);
			
			$connection->query("UPDATE login SET PWord = '$password', token='' WHERE email='$email'");
			
			echo "Your new passwrod is: $str";
		
		
	} else {
		echo "Your Password could not be reset! Please retry to reset your password again from the Login Page.";	
	}
	
	}
?>




</body>
<footer>
</footer>
</html>