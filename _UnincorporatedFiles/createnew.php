<!DOCTYPE html>
<html lang="en">
<head> <!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Create New Survey</title>
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
		- <a href="createnew.php" style="color: #FFFFFF">Create New Survey</a></span>
	</div>
	<!-- Sets up data for the side navigation bar. -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="studentDashboard.php">Home</a>
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
			<h2 class="center">Create New Survey Here!</h2>
			<br>	
			<br>
			<div class="dashboardIcon">
				<a href="######">
					<img src="images/create.png" alt="Start From Scratch" />
					<figcaption>Start From Scratch</figcaption>
				</a>
			</div>
			<div class="dashboardIcon">
				<a href="#######">
					<img src="images/template.png" alt="Use A Template" />
					<figcaption>Use A Template</figcaption>
				</a>
			</div>
								
		</div>
	</div>
	
	<footer>
			
	</footer>
	
</body>
</html>