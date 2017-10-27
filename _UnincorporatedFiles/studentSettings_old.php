<!DOCTYPE html>
<html lang="en">
<head> <!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Settings</title>
	<link rel="stylesheet" href="../_css/bootstrap.min.css" />
	<link href="../_css/style1.css" rel="stylesheet" />
	<script src="../_js/dashboard.js" type="text/javascript"></script>
</head>
<body>
	<header>
	<a href="../_studentPages/studentDashboard.php">
		<img class="logo" src="../_images/knight.jpg" alt="MGA Knight Logo" />
	</a>
	</header>

	<div id="purpleBar">
		<span class="lead">Knightly Knowledge - <a href="../_studentPages/studentDashboard.php" style="color: #FFFFFF">Student Dashboard</a>
		- <a href="settings.php" style="color: #FFFFFF">Settings</a></span>
	</div>
	<!-- Sets up data for the side navigation bar. -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="../_studentPages/studentDashboard.php">Home</a>
		<a href="classes.php">Classes</a>
		<a href="yoursurveys.php">Your Surveys</a>
	<!--	<a href="createnew.php">Create New Survey</a> -->
		<a href="settings.php">Settings</a>
		<a href="facultyFeedback.php">Feedback</a>
		<a href="logout.php">Logout</a>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5">
				<span class="pointer" onclick="openNav()">&#9776; Menu</span>
			</div>
		</div>
	</div>

<h2 class="center">Settings</h2>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-6 col-centered">
			<form action="#" method="post" class="form-horizontal" name="Password">
				</fieldset>
					<!-- Current password -->
					<div class="form-group">
						<label class="control-label col-sm-4" for="OldPassword">Current password:</label>
						<div class="col-sm-7">
							<input type="password" name="OldPassword" class="form-control inputColor">
						</div>
					</div>
					<!-- New Password -->
					<div class="form-group">
						<label class="control-label col-sm-4" for="NewPassword">New password:</label>
						<div class="col-sm-7">
							<input type="password" name="NewPassword" class="form-control inputColor">
						</div>
					</div>
					<!-- Submit form  -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="button" onclick="ChangePassword()" value="Change Password" class="btn btn-primary btn-lg submit">
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>

	<footer>

	</footer>

</body>
</html>


