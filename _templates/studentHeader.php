<?php
include('../_php/session.php');

//redirect to student dashboard
if(isset($_SESSION['Role'])){
	if($Role!= 'Student'){
		if($Role='Faculty'){ header('Location: ../_facultyPages/facultyDashboard.php');}
		else{
			$_SESSION['ErrorBlock'] = "Please Login.";
			header('Location: ../login.php');
			}
	}
}
/*--
--- -- --- WORK FLAG
---This else should do something else...ideas? Maybe return to login? KM -- 8/29 AM
---
--*/
else{ echo "Role not defined.";}
?>

<!DOCTYPE html>
<html lang="en">
<head>			<!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Student Dashboard</title>
	<link rel="stylesheet" href="../_css/bootstrap.min.css" />
	<link href="../_css/style1.css" rel="stylesheet" />
	<script src="../_js/dashboard.js" type="text/javascript"></script>
</head>
<body>
	<a href="studentDashboard.php">
		<img class="logo" src="../_images/knight.jpg" alt="MGA Knight Logo" />
	</a>

	<div id="purpleBar">
<span class="lead">Knightly Knowledge - <a href="studentDashboard.php" style="color: #FFFFFF">Student Dashboard</a>
</div>
<?php ?>
