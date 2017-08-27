<?php 

include('../_php/session.php');

//redirect to student dashboard
if($Role!= 'Faculty')
{
	if($Role='Student'){ header('Location: ../_studentPages/studentDashboard.php');}
	else{header('Location: ../login.php');}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>			<!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Faculty Dashboard</title>
	<link href="../_css/style1.css" rel="stylesheet" />
	<script src="../_js/dashboard.js" type="text/javascript"></script>
</head>
<body>
	<header>
	<a href="facultyDashboard.php">
		<img class="logo" src="../_images/knight.jpg" alt="Knight" />
	</a>	
	</header>
		
	<div id="purpleBar">
		<span class="indent">Knightly Knowledge - Faculty Dashboard</span>
	</div>
<?php ?>	
