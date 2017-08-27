<?php 
include('../_templates/studentHeader.php');
include('../_templates/studentNav.php');
?>

	<div class="wrapper">

		<div id="main">
				
			<h2 class="center">Welcome, <?php echo $FName . " " . $LName?></h2>
			<br><br>
		
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
				<a href="studentfeedback.php">
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