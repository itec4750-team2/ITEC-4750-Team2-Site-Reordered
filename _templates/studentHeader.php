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
<head>			<!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Student Dashboard</title>
	<link href="../_css/style1.css" rel="stylesheet" />
	<script src="../_js/dashboard.js" type="text/javascript"></script>
</head>
<body>
	<a href="studentDashboard.php">
		<img class="logo" src="../_images/knight.jpg" alt="MGA Knight Logo" />
	</a>
		
	<div id="purpleBar">
<span class="indent">Knightly Knowledge - <a href="studentDashboard.php" style="color: #FFFFFF">Student Dashboard</a>
</div>
<?php ?>
