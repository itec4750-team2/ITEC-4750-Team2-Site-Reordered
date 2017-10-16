<?php
//Change: Updated for consistant paths.
include($_SERVER['DOCUMENT_ROOT'].'/_php/session.php');
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Knightly Knowledge</title>
	<?php echo '<link rel="stylesheet" href="'.$server.'/_css/bootstrap.min.css" />';?>
	<?php echo '<link href="'.$server.'/_css/style.css" rel="stylesheet" />';?>
</head>
<body>

    <!--Header (school logo) -->
	<div>
	<header>
		<?php echo '<img src="'.$server.'/_images/MiddleGeorgia_Inst_EXHoriz_DkBgrnd.jpg" alt="MGA Banner" />';?>
	</header>
	<div>

	<!-- Main Content Section-->
	<main>
		<!-- container class for pages -->
		<div class="container-fluid float-left" style="padding: 20px 0px 15px 0px;">

		<!--Header (School logo - left-hand side) -->
			<div id="loginLogo" class="col-sm-6">
				<?php echo'<img src="'.$server.'/_images/knightly knowledge logo.jpg" alt="MGA Knightly Knowledge Logo" width="25%" />'; ?>
			</div>