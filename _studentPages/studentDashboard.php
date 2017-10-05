<?php
include($_SERVER['DOCUMENT_ROOT'].'/_templates/studentHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/studentNav.php');
?>

<html>
<body>

	<div class="wrapper">
	<!-- Main Content Section-->
		<div id="main">
			<?php // if(isset($_SESSION)){echo '<pre>'; print_r($_SESSION); echo '</pre>';}//error checking session	?>

			<h2 class="center">Welcome <?php if(!empty($FName)){echo $FName . " " . $LName;}?></h2>

			<br/><br/>

			<div class="dashboardIcon">
				<a href="classes_student.php">
					<img src="../_images/lecture.png" alt="Classes" />
					<figcaption>Classes</figcaption>
				</a>
			</div>
			<div class="dashboardIcon">
				<a href="yoursurveys_student.php">
					<img src="../_images/yoursurveys.png" alt="Your Surveys" />
					<figcaption>Your Surveys</figcaption>
				</a>
			</div>
			<div class="dashboardIcon">
				<a href="studentSettings.php">
					<img src="../_images/settings.png" alt="Settings" />
					<figcaption>Settings</figcaption>
				</a>
			</div>
			<div class="dashboardIcon">
				<a href="studentFeedback.php">
					<img src="../_images/notebook-1.png" alt="Feedback" />
					<figcaption>Feedback</figcaption>
				</a>
			</div>
			<div class="clear" ></div>

		</div>
	</div>
	<footer>
			
	</footer>
</body>
</html>
