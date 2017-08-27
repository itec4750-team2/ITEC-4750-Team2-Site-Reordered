<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Knightly Knowledge</title>
	<link href="stylez.css" rel="stylesheet" />
</head>
<body>

	<header>
		<img src="images/MiddleGeorgia_Inst_EXHoriz_DkBgrnd.jpg" alt="MGA Banner" />
	</header>
	<br>
		
	<div id="loginLogo">
		<br><br><br>
		<img src="images/knightly knowledge logo.jpg" alt="MGA Knightly Knowledge Logo" width="35%" />
	</div>
	

	<main>
		<form action="#" method="post" id="loginForm">
			<fieldset><legend>Login</legend>
				<div class="two"><label for="email">Email</label><input type="email" name="email" 
					id="userName" placeholder="Enter Email" required></div>
				<div class="two"><label for="password">Password</label><input type="text" name="password" 
					id="password" placeholder="Enter Password" required></div>
				<div class="two"><label for="role">Role</label><select name="role" id="role" required >
					<option value="">Select a Role</option> 
					<option value="faculty">Faculty</option> 
					<option value="student">Student</option>           
				</select></div>  
				<div class="one"><input type="submit" value="Login" id="submit"></div>
			</fieldset>
		</form>
		<br>
	</main>
	<footer>
			
	</footer>