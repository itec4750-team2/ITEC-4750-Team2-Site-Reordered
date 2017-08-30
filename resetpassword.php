<?php 
include('_php/password_reset_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Knightly Knowledge</title>
	<link href="../_css/style.css" rel="stylesheet" />
</head>
<body>
	
    <!--Header (school logo) -->
	<div>
	<header>
		<img src="../_images/MiddleGeorgia_Inst_EXHoriz_DkBgrnd.jpg" alt="MGA Banner" />
	</header>
	<div>
	<!--Header (School logo - left-hand side) -->	
	<div id="loginLogo">
		<img src="../_images/knightly knowledge logo.jpg" alt="MGA Knightly Knowledge Logo" width="25%" />
	</div>
	
		<!-- Main Content Section-->
	<main>
	<form action="#" method="post" id="resetPassForm">
			
		<h2 class="center">Welcome, You are changing the password for: <?php if(!empty($_GET['email'])){echo $_GET['email'];}?></h2>
	
		<fieldset><legend>Set New Password</legend>
			
			<!-- Password1 -->
				<div class="two"><label for="Pword1">Enter New Password</label><input type="password" name="Pword1" 
					id="password" placeholder="Enter Password" required></div>
			
			<!-- Password2 -->
				<div class="two"><label for="Pword2">Retype Password</label><input type="password" name="Pword2" 
					id="password" placeholder="Enter Password" required></div>
					
			<!-- Submit form  -->
				<div class="one"><input type="submit" value="Reset" name="resetPass" id="submit"></div>
								
			<!-- Error Msg -->
			<div class "errors">
			<?php
			include('_templates/errorBlock.php');
			?>
			</div>
		</fieldset>
	</form>
	<div class = 'clear'><?php include('_templates/mainNav.php');?></div>
	</main>
<?php include('_templates/footer.php');?>	