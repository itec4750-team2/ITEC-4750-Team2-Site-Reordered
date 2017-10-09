<?php

//Change: Updated for consistant paths.
include($_SERVER['DOCUMENT_ROOT'].'/_php/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');

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
<head><!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Student Dashboard</title>
	<?php echo '<link rel="stylesheet" href="'.$server.'/_css/bootstrap.min.css" />';?>
	<?php echo '<link rel="stylesheet" href="'.$server.'/_css/style1.css" />';?>
	<?php echo '<script src="'.$server.'/_js/dashboard.js" type ="text/javascript"></script>';?>
</head>
<body>
	<header>
		<a href="studentDashboard.php">
			<?php echo '<img class="logo" src="'.$server.'/_images/knight.jpg" alt="Knight" />'; ?>
		</a>
	</header>
	
	<div id="purpleBar">
		<span class="lead">Knightly Knowledge - Student Dashboard</a>
	</div>
</body>
<?php ?>
