<!DOCTYPE html>
<html lang="en">
	<head>	<!-- Builds basis of site. Sets style1 as the CSS for this page. -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Knightly Knowledge - Feedback</title>
		<link rel="stylesheet" href="../_css/bootstrap.min.css" />
		<link href="../_css/style1.css" rel="stylesheet" />
		<script src="../_js/dashboard.js" type="text/javascript"></script>
		<script src="../_js/validateFeedbackForm.js" type="text/javascript"></script>
	</head>

	<body>
		<header>
			<a href="studentDashboard.php">
			<img class="logo" src="../_images/knight.jpg" alt="MGA Knight Logo" />
			</a>
		</header>

		<div id="purpleBar">
			<span class="lead">Knightly Knowledge - <a href="studentDashboard.php" style="color: #FFFFFF">Student Dashboard</a>
			- <a href="classes.php" style="color: #FFFFFF">Classes</a></span>
		</div>

		<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/studentNav.php');?>

		<div class="container-fluid" id="main">
			<div class="row">
				<div class="col-md-7 col-centered formatContainer">
					<br>
					<h4 class="center"><b>Please leave your feedback on this tool, as this allows us to assess its usefulness.</b></h4>
					<hr>
					<br>
					<form name="feedbackForm" action="mailto:john.doe@imagination.biz" method="post" onsubmit="return validateForm();">

						<fieldset class="form-group">
							<label for="feedbackRadio">Were you able to access the information you required?</label>
							<div class="form-check">
							<label class="form-check-label">
								<input type="radio" id="yesRadio" class="form-check-input" name="radio">
								Yes!
							</label>
							</div>
							<div>
							<label class="form-check-label">
								<input type="radio" id="noRadio" class="form-check-input" name="radio">
								No. (Please explain below in the comments.)
							</label>
							</div>
						</fieldset>
						<br>
						<hr>
						<br>

						<!-- these should eventually be populated via a table from the database imo.  
						  -- Updating hard coded entries for now -- MM 10/04 -->

						<label for="feedbackSelection">To whom should your feedback be sent?</label>
						<select class="form-control">
							<option value="Dr. Scott Spangler">Dr. Scott Spangler (Project Stakeholder)</option>
							<option value="Angela Ivey">Angela Ivey (Project Captain)</option>
							<option value="Adam Hudnall">Adam Hudnall (Project Manager)</option>
							<option value="Sarah Goodman">Sarah Goodman (Development; HTML/CSS)</option>
							<option value="Katie Markham">Katie Markham (Development; Database/PHP)</option>
							<option value="Joseph Dent">Joseph Dent (Development; Database/PHP)</option>
							<option value="Joel Gregory">Joel Gregory (Development; Database/PHP)</option>
							<option value="Michael Matthews">Michael Matthews (Development; HTML/CSS)</option>
							<option value="Thomas Haastrup">Thomas Haastrup (Research, Administrative)</option>
							<option value="Molly Hester">Molly Hester (Research, Administrative)</option>
							<option value="Andrew Dixon">Andrew Dixon (Research, Administrative)</option>
							<option value="All">All team members.</option>
						</select>
						<br>
						<hr>
						<br>
						<label for="feedbackCheckbox">What did you (not) like about the site?</label><br><br>
						<div class="form-check">
							<label for="backgroundCheckbox" class="form-check-label">
								<input name="backgroundCheckbox" id="backgroundCheckbox" class="form-check-input" type="checkbox" value="">
								Background
							</label>
						</div>
						<div class="form-check">
							<label for="colorCheckbox" class="form-check-label">
								<input name="colorCheckbox" id="colorCheckbox" class="form-check-input" type="checkbox" value="">
								Use of text color
							</label>
						</div>
						<div class="form-check">
							<label for="navigationCheckbox" class="form-check-label">
								<input  name="navigationCheckbox" id="navigationCheckbox" class="form-check-input" type="checkbox" value="">
								Navigation method
							</label>
						</div>
						<div class="form-check">
							<label for="otherCheckbox" class="form-check-label">
								<input name="otherCheckbox" id="otherCheckbox" class="form-check-input" type="checkbox" value="">
								Other (Please specify below in the comments.)
							</label>
						</div>
						<br>
						<hr>
						<br>
						<div class="form-group">
							<label for="myFname">First Name: </label>
							<input  type="text" name="myFname" id="myFname" class="form-control">
						</div>
						<div class="form-group">
							<label for="myLname">Last Name: </label>
							<input type="text" name="myLname" id="myLname" class="form-control">
						</div>
						<div class="form-group">
							<label for="myEmail">*E-mail: </label>
							<input type="text" name="myEmail" id="myEmail" class="form-control">
						</div>
						<div class="form-group">
							<label for="myPhone">Phone: </label>
							<input type="tel" name="myPhone" id="myPhone" class="form-control">
						</div>
						<div class="form-group">
							<label for="myComments">Comments: </label>
							<textarea name="myComments" id="myComments" class="form-control" rows="3"></textarea>
						</div>
						<br>
						<br>
						<div class="center">
							<input type="submit" id="mySubmit" class="btn btn-primary btn-lg feedbackBtn">
							<input type="reset" id="reset" class="btn btn-primary btn-lg feedbackBtn">
						</div>
						<br>
					</form>
				</div>
			</div>
		</div>
		<br>
	</body>
</html>