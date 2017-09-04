<!DOCTYPE html>
<html lang="en">
	<head>	<!-- Builds basis of site. Sets style1 as the CSS for this page. -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Knightly Knowledge - Feedback</title>
		<link href="../_css/style1.css" rel="stylesheet" />
		<script src="../_js/dashboard.js" type="text/javascript"></script>
		<script src="../_js/sitescripts.js" type="text/javascript"></script>
	</head>

	<body>
		<header>
			<a href="studentDashboard.php">
			<img class="logo" src="../_images/knight.jpg" alt="MGA Knight Logo" />
			</a>
		</header>

		<div id="purpleBar">
			<span class="indent">Knightly Knowledge - <a href="studentDashboard.php" style="color: #FFFFFF">Student Dashboard</a>
			- <a href="classes.php" style="color: #FFFFFF">Classes</a></span>
		</div>

		<?php include('../_templates/studentNav.php');?>

		<br>
		<div class="container" id="main">
			<h4 class="center">Please leave your feedback on this tool, as this allows us to assess its usefulness.</h4>
			<hr>
			<br>
			<form action="mailto:john.doe@imagination.biz" method="post" onsubmit="return validateForm();">

			<label for="feedbackRadio">Were you able to access the information you required?</label><br><br>
			<div class="control-group">
				<label class="control control-radio">
					Yes!
					<input type="radio" name="radio" id="yesRadio" />
					<div class="control_indicator"></div>
				</label>
				<label class="control control-radio">
					No. (Please explain below in the comments.)
					<input type="radio" name="radio" id="noRadio" />
					<div class="control_indicator"></div>
				</label>
			</div>
			<br>
			<hr>
			<br>

			<label for="feedbackSelection">To whom should your feedback be sent?</label>
			<select>
				<option value="Dr. Scott Spangler">Dr. Scott Spangler (Project Stakeholder)</option>
				<option value="Deodrick Baugh">Deodrick Baugh (Project Captain)</option>
				<option value="Alex Bos">Alex Bos (HTML Team)</option>
				<option value="Ronak Brahmbhatt">Ronak Brahmbhatt (Database Team)</option>
				<option value="Theresa Brown">Theresa Brown (HTML Team)</option>
				<option value="Jack Campbell">Jack Campbell (HTML Team)</option>
				<option value="Colby Carr">Colby Carr (HTML Coordinator)</option>
				<option value="Jared Dorminey">Jared Dorminey (HTML Team)</option>
				<option value="Jamie Hampton">Jamie Hampton (Database Team)</option>
				<option value="All">All team members.</option>
			</select>
			<br>
			<br>
			<hr>
			<br>
			<label for="feedbackCheckbox">What did you (not) like about the site?</label><br><br>
			<div class="control-group">
				<label for="backgroundCheckbox" class="control control-checkbox">
					Background
					<input type="checkbox" name="backgroundCheckbox" id="backgroundCheckbox" />
					<div class="control_indicator"></div>
				</label>
				<label for="colorCheckbox" class="control control-checkbox">
					Use of text color
					<input type="checkbox" name="colorCheckbox" id="colorCheckbox" />
					<div class="control_indicator"></div>
				</label>
				<label for="navigationCheckbox" class="control control-checkbox">
					Navigation method
					<input type="checkbox" name="navigationCheckbox" id="navigationCheckbox" />
					<div class="control_indicator"></div>
				</label>
				<label for="otherCheckbox" class="control control-checkbox">
					Other (Please specify below in the comments.)
					<input type="checkbox" name="otherCheckbox" id="otherCheckbox" />
					<div class="control_indicator"></div>
				</label>
			</div>
			<br>
			<hr>
			<br>
			<label for="myFname">First Name: </label>
				<input type="text" name="myFname" id="myFname">
				<br>
				<br>
			<label for="myLname">Last Name: </label>
				<input type="text" name="myLname" id="myLname">
				<br>
				<br>
			<label for="myEmail">*E-mail: </label>
				<input type="email" name="myEmail" id="myEmail">
				<br>
				<br>
			<label for="myPhone">Phone: </label>
				<input type="tel" name="myPhone" id="myPhone">
				<br>
				<br>
			<label for="myComments">Comments: </label>
			<textarea name="myComments" id="myComments" style="height:125px"></textarea>
				<br>
				<br>
			<div class="center">
				<input type="submit" id="mySubmit">
				<input type="reset" id="reset">
			</div>
		</form>
		</div>
		<br>
	</body>
</html>