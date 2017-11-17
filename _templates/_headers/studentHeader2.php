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

<!--
--- -- --- WORK FLAG
--- We should check all these scripts and see what they are doing.
--- Maybe consolidate down to one student header and add bread crumbs at top. KM -- 8/29 AM
-->

<head> <!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge <?php if(isset($title)){echo" - ". $title;} ?></title>
	<link rel="stylesheet" href="../_css/bootstrap.min.css" />
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
		<span class="lead">Knightly Knowledge - <?php if(isset($title)){echo " - ".$title;}?></a>

<?php ?>
