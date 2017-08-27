<?php 
include ("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head> <!-- Builds basis of site. Sets style1 as the CSS for this page. -->
	<meta charset="utf-8">
	<title>Knightly Knowledge - Reporting</title>
	<link href="style2.css" rel="stylesheet" />
	<script src="dashboard.js" type="text/javascript"></script>
</head>
<body>
	<header>
	<a href="facultyDashboard.php">
		<img class="logo" src="images/knight.jpg" alt="MGA Knight Logo" />
	</a>	
	</header>
		
	<div id="purpleBar">
		<span class="indent">Knightly Knowledge - <a href="facultyDashboard.php" style="color: #FFFFFF">Faculty Dashboard</a>
		- <a href="classes.php" style="color: #FFFFFF">Classes</a> 
		- <a href="reporting.php" style="color: #FFFFFF">Reporting</a></span>
	</div>
	<!-- Sets up data for the side navigation bar. -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="classes.php">Classes</a>
		<a href="yoursurveys.php">Your Surveys</a>
		<a href="createnew.php">Create New Survey</a>
		<a href="settings.php">Settings</a>
		<a href="facultyfeedback.php">Feedback</a>
		<a href="logout.php">Logout</a>
	</div>
	<span class="pointer" onclick="openNav()">&#9776; Menu</span>
	
	<div class="wrapper">

		<div id="main">
			<?php

			$StudentID = mysql_real_escape_string($_POST['selecting']);
			$table = 'response';

			$query = mysql_query ("SELECT * FROM {$table} WHERE StudentID = '$StudentID'");
			if (!$query) {
				die("Query to show fields from table failed");
			} 

			$fields_num = mysql_num_fields($query);

			echo "<table border='1'><tr>";
			// printing table headers
			for($i=0; $i<$fields_num; $i++)
			{
				$field = mysql_fetch_field($query);
				echo "<td>{$field->name}</td>";
			}
			echo "</tr>\n";
			// printing table rows
			while($row = mysql_fetch_row($query))
			{
				echo "<tr>";

				// $row is array... foreach( .. ) puts every element
				// of $row to $cell variable
				 foreach($row as $cell)
					echo "<td>$cell</td>";

				echo "</tr>\n";
			}
			mysql_free_result($query);


			?>
		</div>
	</div>
	
	<footer>
			
	</footer>
	
</body>
</html>