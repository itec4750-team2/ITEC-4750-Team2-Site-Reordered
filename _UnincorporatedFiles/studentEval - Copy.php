<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Knightly Knowledge - Student Evaluation</title>
	<link href="style1.css" rel="stylesheet" />
	<script src="dashboard.js" type="text/javascript"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
	<script src="sitescripts.js"></script>
	<script src="jquery-1.12.3.min.js"></script>
</head>
<body>
	<header>
	<a href="studentDashboard.php">
		<img class="logo" src="images/knight.jpg" alt="MGA Knight Logo" />
	</a>	
	</header>
		
	<div id="purpleBar">
		<span class="indent">Knightly Knowledge - Student Evaluation</span>
	</div>
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<a href="studentDashboard.php">Home</a>
		<a href="classes_student.php">Classes</a>
		<a href="yoursurveys_student.php">Your Surveys</a>
		<a href="logout.php">Logout</a>
	</div>
	<span class="pointer" onclick="openNav()">&#9776; Menu</span>
	<div class="wrapper">
		<div id="intro">
			<h2 class="center">CONFIDENTAL PEER EVALUATION</h2>
			<p>Please use the form on the next page to evaluate each member of your group.</p><br>
			<p>You will evaluate <span class="underline">ONE</span> MEMBER AT A TIME.</p><br>
			<p>When you submit the form, you will be given the opportunity to evaluate the NEXT member of your group.</p><br>
			<input type="button" class="click1" value="Select Student">
			<hr>
		</div>
		<div id="group">
			<p>Please select a member of your group to evaluate.</p><br>
			<p>PLEASE NOTE: You will repeat the evaluation for <span class="underline">EACH</span> group member
				until all group members have been evaluated.
			</p><br>
			<div><label for="groupMember">&nbsp;</label>
				<?php
				$sql=mysql_query("SELECT StudentID,FName,LName FROM Student ");
				if(mysql_num_rows($sql)){
				$select= '<select name="select">';
				while($rs=mysql_fetch_array($sql)){
					  $select.='<option value="'.$rs['StudentID'].'">'.$rs['FName']." ".$rs['LName'].'</option>';
				  }
				}
				$select.='</select>';
				echo $select;
				?>
			</div> <br>
			<input type="button" class="click2" value="Enter Rating">
			<hr>
		</div>
		<div id="rating">
			<br>
			<form action="studentEval_results.php" method="post" id="loginForm">
				<?php
				$sql=mysql_query("SELECT StudentID,FName,LName FROM Student ");
				if(mysql_num_rows($sql)){
				$select= '<select name="select">';
				while($rs=mysql_fetch_array($sql)){
					  $select.='<option value="'.$rs['StudentID'].'">'.$rs['FName']." ".$rs['LName'].'</option>';
				  }
				}
				$select.='</select>';
				echo $select;
				?>
			Please choose a value for each question (1 = LOWEST, 5 = HIGHEST)
			<br>
			</br>
				<fieldset>
					<label for="quality">Rate this group member on his/her QUALITY of contribution
						</label><br>
						<select name="quality" id="quality" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value="5">5</option> 
						</select><br><hr><br>
					<label for="quantity">Rate this group member on his/her QUANTITY of contribution
						</label><br>
						<select name="quantity" id="quantity" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value "5">5</option> 
						</select><br><hr><br> 
					<label for="creativity">Rate this group member on his/her CREATIVITY
						</label><br>
						<select name="creativity" id="creativity" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value="5">5</option> 
						</select><br><hr><br> 
					<label for="turnTaking">Rate this group member on his/her TURN TAKING or allowing others to participant
						</label><br>
						<select name="turnTaking" id="turnTaking" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value="5">5</option> 
						</select><br><hr><br> 
					<label for="effort">Rate this group member on his/her EFFORT or time spent on project
						</label><br>
						<select name="effort" id="effort" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value="5">5</option> 
						</select><br><hr><br> 
					<label for="attitude">Rate this group member on his/her ATTITUDE toward the group
						</label><br>
						<select name="attitude" id="attitude" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value="5">5</option> 
						</select><br><hr><br> 
					<label for="attendance">Rate this group member on his/her ATTENDANCE to group meetings
						</label><br>
						<select name="attendance" id="attendance" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value="5">5</option> 
						</select><br><hr><br> 
					<label for="preparation">Rate this group member on his/her PREPARATION for group meetings
						</label><br>
						<select name="preparation" id="preparation" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value="5">5</option> 
						</select><br><hr><br> 
					<label for="willingness">Rate this group member on his/her WILLINGNESS to accept and complete tasks
						</label><br>
						<select name="willingness" id="willingness" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value="5">5</option> 
						</select><br><hr><br> 
					<label for="completion">Rate this group member on his/her COMPLETION of tasks ON TIME
						</label><br>
						<select name="completion" id="completion" required >
							<option value="1">1</option> 
							<option value="2">2</option> 
							<option value="3">3</option>    
							<option value="4">4</option> 
							<option value="5">5</option> 
						</select><br>
					<br>
					<div class="one"><input type="submit" value="Submit Evaluation" name="submitEval" id="submitEval"></div><br>
				</fieldset>
			</form>
		</div>
	</div>
	
	<footer>
			
	</footer>
	
</body>
</html>