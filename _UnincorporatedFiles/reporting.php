<?php 
include ("config.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head> <!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Reporting</title>
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
		- <a href="classes.php" style="color: #FFFFFF">Classes</a> - <a href="reporting.php" style="color: #FFFFFF">Reporting</a></span>
	</div>
	<!-- Sets up data for the side navigation bar. -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="facultyDashboard.php">Home</a>
		<a href="classes.php">Classes</a>
		<a href="yoursurveys.php">Your Surveys</a>
		<a href="createnew.php">Create New Survey</a>
		<a href="settings.php">Settings</a>
		<a href="facultyfeedback.php">Feedback</a>
		<a href="logout.php">Logout</a>
	</div>
	<span class="pointer" onclick="openNav()">&#9776; Menu</span>
	
	<div class="wrapper">

		<div id="main">
		<div class="center"><h2>Individual Evaluations</h2></div>
		<?php
			include ("indvReporting.php");
		?><br><br>
		<div class="center"><h2>Class Evaluations</h2></div>
		<?php
		include ("classReporting.php");
		?>	
		</div>
	</div>
	
	<footer>
			
	</footer>
	
</body>
</html>