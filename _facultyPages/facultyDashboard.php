<?php 
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
?>
	
	<div class="wrapper">
	<!-- Sets up the dashboard. -->
		<div id="main">
				
			<h2 class="center">Welcome, <?php echo $FName . " " . $LName ?></h2>
			<p>
			</p><br><br>
		
			<div class="dashboardIcon">
				<a href="classes.php">
					<img src="../_images/lecture.png" alt="Classes" />
					<figcaption>Classes</figcaption>
				</a>
			</div>
			<div class="dashboardIcon">
				<a href="yoursurveys.php">
					<img src="../_images/yoursurveys.png" alt="Your Surveys" />
					<figcaption>Your Surveys</figcaption>
				</a>
			</div>
			<!-- This section will be implemented by future development teams if deemed appropriate. -->
			<!-- <div class="clear" ></div> -->
			<!-- <div class="dashboardIcon"> -->
			<!--	<a href="createnew.php"> -->
	        <!--		<img src="images/createnew.png" alt="Create New Survey" /> -->
			<!--		<figcaption>Create New Survey</figcaption>-->
			<!-- </a> -->
			<!-- </div> -->
			<div class="dashboardIcon">
				<a href="settings.php">
					<img src="../_images/settings.png" alt="Settings" />
					<figcaption>Settings</figcaption>
				</a>
			</div>
			<div class="dashboardIcon">
				<a href="facultyfeedback.php">
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