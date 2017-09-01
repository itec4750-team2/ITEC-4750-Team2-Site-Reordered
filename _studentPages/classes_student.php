<?php 
include('../_templates/studentHeader.php');
include('../_templates/studentNav.php');
?>
	</div>
	<!-- Main Content Section-->
	<div class="wrapper">

		<div id="main">
			<h2 class="center">Your Classes</h2>
					<!--
		--- -- --- WORK FLAG
		--- Thie classes need to be hidden for expired classes. 
		--- Calculation should be done on the faculty_classes page. KM -- 8/31 AM
		-->
			<table>
			  <tr>
				<th>Class ID</th>
				<th>Class Number</th>
				<th>Class Name</th>
				<th>Semester</th><th></th>
				<th>Class Expire Date</th>
			  </tr>
			  
			<?php echo $StuClasses; ?> <!-- Sarah this is set up to echo table rows and table data.-->

			</table>

			<hr>
			
		</div>
	</div>
	
	<footer>
			
	</footer>
	
</body>
</html>