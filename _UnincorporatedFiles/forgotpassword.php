

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
	<form action='forgotpassword.php' method='post'>
		<input type='text' name='email' placeholder='email'>
	<br>
		<input type='submit' name='forgotpass' value='Request Password'>
	</form>
<?php
	if (isset($_POST["forgotpass"])) {
		$connection = new mysqli("168.16.222.102","capstone-eval-tool-user","Ca5tN0tJuDgET*3@ch!","capstone-eval-tool");
		
	$email = $connection->real_escape_string($_POST["email"]);
	
		$data = $connection->query("SELECT LoginID FROM login WHERE email='$email'");
	
		if ($data->num_rows > 0) {
			$str = "0123456789qwerty";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);
			$url = "/resetpassword.php?token=$str&email=$email";
			
			
			echo $url;
			mail($email, "MGA Password Reset", "To reset your password, please visit this link by replacing forgotpassword.php with: $url", "From: surveyadmin@mga.edu\r\n");
			
			$connection->query("UPDATE login SET token='$str' WHERE email='$email' ");
			
			echo "Please Check your E-Mail to reset your password.";
			
		} else {
			echo "Please enter a valid email address!";
		}
	}
?>

</body>
<footer>
</footer>
</html>