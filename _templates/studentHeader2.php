<?php 
include('../_php/session.php');

//redirect to student dashboard
if($Role!= 'Student')
{
	if($Role='Faculty'){ header('Location: ../_facultyPages/facultyDashboard.php');}
	else{header('Location: ../login.php');}
}
?>

	
<!DOCTYPE html>
<html lang="en">
<head> <!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Student Evaluation</title>
	<link href="../_css/style1.css" rel="stylesheet" />
	<script src="../_js/dashboard.js" type="text/javascript"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
	<script src="../_js/sitescripts.js"></script>
	<script src="../_js/jquery-1.12.3.min.js"></script>
</head>
<!-- Header Section -- Creates clickable image that redirects to the Student Dashboard -->
<body>
	<header>
	<a href="studentDashboard.php">
		<img class="logo" src="../_images/knight.jpg" alt="MGA Knight Logo" />
	</a>	
	</header>
	<!--Navigation Bar (purple) -->

	
	<div id="purpleBar">
		<span class="indent">Knightly Knowledge - <a href="studentDashboard.php" style="color: #FFFFFF">Student Dashboard</a>

	
<?php ?>
