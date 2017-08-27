<!DOCTYPE html>
<html lang="en">
<head> <!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Settings</title>
	<link href="style1.css" rel="stylesheet" />
	<script src="dashboard.js" type="text/javascript"></script>
</head>
<body>
	<header>
	<a href="facultyDashboard.php">
		<img class="logo" src="images/knight.jpg" alt="MGA Knight Logo" />
	</a>	
	</header>
		
	<div id="purpleBar">
		<span class="indent">Knightly Knowledge - <a href="facultyDashboard.php" style="color: #FFFFFF">Faculty Dashboard</a>
		- <a href="settings.php" style="color: #FFFFFF">Settings</a></span>
	</div>
	<!-- Sets up data for the side navigation bar. -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="facultyDashboard.php">Home</a>
		<a href="classes.php">Classes</a>
		<a href="yoursurveys.php">Your Surveys</a>
	<!--	<a href="createnew.php">Create New Survey</a> -->
		<a href="settings.php">Settings</a>
		<a href="facultyfeedback.php">Feedback</a>
		<a href="logout.php">Logout</a>
	</div>
	<span class="pointer" onclick="openNav()">&#9776; Menu</span>
	
	<div class="wrapper">
	
		<div id="settings">
			<h2 class="center">Settings</h2>
			<div class=one>
			<p>You may change your settings on this page.</p><br>
			</div class=one>
			<fieldset>
			<br>
			<form Name=Password>
			 Current password: <input Name=OldPassword type=password> 
			 <br>
			 <br>
			 New password: <input Name=NewPassword type=password>
			 <br>
			 <br>
			 <div class="one"><input type=button onclick="ChangePassword()" Value="Change Password" id="changepassword">
			</form>
			</div>
		</div>
	</div>
			</fieldset>
	<footer>
			
	</footer>
	
</body>
</html>


