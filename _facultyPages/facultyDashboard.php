<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Faculty Dashboard';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='facultyDashboard';
?>

	<div class="wrapper">
	<!-- Sets up the dashboard. -->
		<div id="main">
			<?php //if(isset($_SESSION)){echo '<pre>'; print_r($_SESSION); echo '</pre>';}//error checking session	?>

			<h2 class="center">Welcome <?php if(isset($_SESSION['FName'])){echo $FName . " " . $LName;}?></h2>

			<br/><br/>

			<div class="dashboardIcon">
				<a href="../_facultyPages/classes.php">
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
				<a href="facultyFeedback.php">
					<img src="../_images/notebook-1.png" alt="Feedback" />
					<figcaption>Feedback</figcaption>
				</a>
			</div>
			<div class="clear" ></div>

		</div>
	</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/footer.php');?>

</body>
</html>