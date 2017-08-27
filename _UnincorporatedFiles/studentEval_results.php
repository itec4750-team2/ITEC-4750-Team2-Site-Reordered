<?php
include("input-eval.php");
?>
<!DOCTYPE html>
<html lang="en">
<head> <!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Student Evaluation Results</title>
	<link href="style1.css" rel="stylesheet" />
	<script src="dashboard.js" type="text/javascript"></script>
</head>
<body>
	<a href="studentDashboard.php">
		<img class="logo" src="images/knight.jpg" alt="MGA Knight Logo" />
	</a>
		
	<div id="purpleBar">
		<span class="indent">Knightly Knowledge - <a href="studentDashboard.php" style="color: #FFFFFF">Student Dashboard</a>
		- <a href="classes_student.php" style="color: #FFFFFF">Classes</a>
		- <a href="studentEval.php" style="color: #FFFFFF">Student Evaluation</a></span>
	</div>
	<!-- Sets up data for the side navigation bar. -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="studentDashboard.php">Home</a>
		<a href="classes_student.php">Classes</a>
		<a href="yoursurveys_student.php">Your Surveys</a>
		<a href="studentfeedback.php">Feedback</a>
		<a href="logout.php">Logout</a>
	</div>
	<span class="pointer" onclick="openNav()">&#9776; Menu</span>
	
	<div class="wrapper">

		<div id="main">
				
			<h2 class="center">You have successfully submitted your evaluation!</h2>
			<p class="center">Student: <?php echo ($StudentID); ?> </p>
			<p class="center">Quality: <?php echo ($quality); ?> </p>
			<p class="center">Quantity: <?php echo ($quantity); ?> </p>
			<p class="center">Creativity: <?php echo ($creativity); ?> </p>
			<p class="center">Turn Taking: <?php echo ($turnTaking); ?> </p>
			<p class="center">Effort: <?php echo ($effort); ?> </p>
			<p class="center">Attitude: <?php echo ($attitude); ?> </p>
			<p class="center">Attendance: <?php echo ($attendance); ?> </p>
			<p class="center">Preparation: <?php echo ($preparation); ?> </p>
			<p class="center">Willingness: <?php echo ($willingness); ?> </p>
			<p class="center">Completion: <?php echo ($completion); ?> </p>
			<p class="center"><a href="studentEval.php">Back to Evaluations</a></p>
			
			
			
		
		</div>
	</div>
	
	<footer>
			
	</footer>
	
</body>
</html>