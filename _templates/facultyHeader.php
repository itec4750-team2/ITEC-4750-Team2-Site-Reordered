<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
include('../_php/session.php');

//redirect to student dashboard
if(isset($_SESSION['Role'])){
	if($Role!= 'Faculty'){
		if($Role='Student'){ header('Location: ../_studentPages/studentDashboard.php');}
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
<head><!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Faculty Dashboard</title>
	<link rel="stylesheet" href="../_css/bootstrap.min.css" />
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
		<span class="lead">Knightly Knowledge - Faculty Dashboard</span>
	</div>
<?php ?>
