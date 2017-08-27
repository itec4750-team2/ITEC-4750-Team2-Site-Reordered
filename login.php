<?php
include('_php/login_functions.php');
include('_php/session.php');
//include('_php/connection_check.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Knightly Knowledge</title>
	<link href="_css/style.css" rel="stylesheet" />
</head>
<body>
    <!--Header (school logo) -->
	<header>
		<img src="_images/MiddleGeorgia_Inst_EXHoriz_DkBgrnd.jpg" alt="MGA Banner" />
	</header>
	<br>
	<!--Header (School logo - left-hand side) -->	
	<div id="loginLogo">
		<br><br><br>
		<img src="_images/knightly knowledge logo.jpg" alt="MGA Knightly Knowledge Logo" width="35%" />
	</div>
	<!-- Main Content Section-->
	<main>
		<form action="#" method="post" id="loginForm">
			<fieldset><legend>Login</legend>
			<!-- Email Field-->
				<div class="two"><label for="Email">Email</label><input type="email" name="Email" 
					id="userName" placeholder="Enter Email" required></div>
			<!-- Password -->
				<div class="two"><label for="Pword">Password</label><input type="password" name="Pword" 
					id="password" placeholder="Enter Password" required></div>
			<!-- Submit form  -->
				<div class="one"><input type="submit" value="Login" name="Login" id="submit"></div>
				<div class="two"><a href="forgotpassword.php">Forgot Password?</a></div>
				
			<!-- Login Error Msg -->
		<?php if (isset($_SESSION['LoginErrors'])): ?>
			<div class="form-errors">
			<?php foreach($_SESSION['LoginErrors'] as $error): ?>
			<p><?php echo $error ?></p>
			<?php endforeach; ?>
			<?php endif; ?>
		</fieldset>
		</form>

	</main>
	<footer>
			
	</footer>
	
</body>
</html>