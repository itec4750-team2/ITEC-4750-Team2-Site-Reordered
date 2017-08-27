<?php 
include('../_templates/studentHeader2.php');
include('../_templates/studentNav.php');
include('../_php/config.php');
?>
<!--
--- -- --- WORK FLAG
---This page still needs work. Edited php query to mysqli but should be moved out of document and function needs testing. KM -- 8/27 AM
---
-->
		- <a href="classes_student.php" style="color: #FFFFFF">Classes</a>
		- <a href="studentEval.php" style="color: #FFFFFF">Student Evaluation</a></span>
	</div>
	<!-- Main Content Section-->
	<div class="wrapper">
	    <!-- User's instructions 1st page-->
		<div id="intro">
			<h2 class="center">CONFIDENTAL PEER EVALUATION</h2>
			<p>Please use the form on the next page to evaluate each member of your group.</p><br>
			<p>You will evaluate <span class="underline">ONE</span> MEMBER AT A TIME.</p><br>
			<p>When you submit the form, you will be given the opportunity to evaluate the NEXT member of your group.</p><br>
			
			<hr>
		</div>	
		<!-- User's instructions 2nd page-->
		<div id="rating">
			<p>Please select a member of your group to evaluate.</p><br>
			<p>PLEASE NOTE: You will repeat the evaluation for <span class="underline">EACH</span> group member
				until all group members have been evaluated.
			</p><br>
			<br>
			<form action="studentEval_results.php" method="post" id="loginForm">
			Please choose a value for each question (1 = LOWEST, 5 = HIGHEST)
			<br>
			</br>
		<!-- Evaluation Form-->
				<fieldset>
					<label for="groupMember">&nbsp;</label>
					
					<?php
					$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
					$sqlStr="SELECT StudentID,FName,LName FROM Student ";
					$sql= mysqli_query($con, $sqlStr); 
					if(mysqli_num_rows($sql)){
					$select= '<select name="select">';
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['StudentID'].'">'.$rs['FName']." ".$rs['LName'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
					?>
					
					<div>
					<input type="button" class="click1" value="Select Student">
					</div>
					<br><hr><br>
					<label for="quality">Rate this group member on his/her QUALITY of contribution
						</label><br>
						<input type="radio" name="quality" value="1" >1 - Poor 
						<input type="radio" name="quality" value="2" >2 - Fair 
						<input type="radio" name="quality" value="3" >3 - Good
						<input type="radio" name="quality" value="4" >4 - Excellent 
						<input type="radio" name="quality" value="5" >5 - Exceptional<br><hr><br>
					<label for="quantity">Rate this group member on his/her QUANTITY of contribution
						</label><br>
					    <input type="radio" name="quantity" value="1" >1 - Poor
						<input type="radio" name="quantity" value="2" >2 - Fair
						<input type="radio" name="quantity" value="3" >3 - Good
						<input type="radio" name="quantity" value="4" >4 - Excellent
						<input type="radio" name="quantity" value="5" >5 - Exceptional<br><hr><br> 
					<label for="creativity">Rate this group member on his/her CREATIVITY
						</label><br>
					    <input type="radio" name="creativity" value="1" >1 - Poor
						<input type="radio" name="creativity" value="2" >2 - Fair
						<input type="radio" name="creativity" value="3" >3 - Good
						<input type="radio" name="creativity" value="4" >4 - Excellent
						<input type="radio" name="creativity" value="5" >5 - Exceptional<br><hr><br> 
					<label for="turnTaking">Rate this group member on his/her TURN TAKING or allowing others to participant
						</label><br>
						<input type="radio" name="turnTaking" value="1" >1 - Poor
						<input type="radio" name="turnTaking" value="2" >2 - Fair
						<input type="radio" name="turnTaking" value="3" >3 - Good
						<input type="radio" name="turnTaking" value="4" >4 - Excellent
						<input type="radio" name="turnTaking" value="5" >5 - Exceptional<br><hr><br> 
					<label for="effort">Rate this group member on his/her EFFORT or time spent on project
						</label><br>
						<input type="radio" name="effort" value="1" >1 - Poor
						<input type="radio" name="effort" value="2" >2 - Fair
						<input type="radio" name="effort" value="3" >3 - Good
						<input type="radio" name="effort" value="4" >4 - Excellent
						<input type="radio" name="effort" value="5" >5 - Exceptional<br><hr><br> 
					<label for="attitude">Rate this group member on his/her ATTITUDE toward the group
						</label><br>
					    <input type="radio" name="attitude" value="1" >1 - Poor
						<input type="radio" name="attitude" value="2" >2 - Fair
						<input type="radio" name="attitude" value="3" >3 - Good
						<input type="radio" name="attitude" value="4" >4 - Excellent
						<input type="radio" name="attitude" value="5" >5 - Exceptional<br><hr><br> 
					<label for="attendance">Rate this group member on his/her ATTENDANCE to group meetings
						</label><br>
						<input type="radio" name="attendance" value="1" >1 - Poor
						<input type="radio" name="attendance" value="2" >2 - Fair
						<input type="radio" name="attendance" value="3" >3 - Good
						<input type="radio" name="attendance" value="4" >4 - Excellent
						<input type="radio" name="attendance" value="5" >5 - Exceptional<br><hr><br> 
					<label for="preparation">Rate this group member on his/her PREPARATION for group meetings
						</label><br>
					    <input type="radio" name="preparation" value="1" >1 - Poor
						<input type="radio" name="preparation" value="2" >2 - Fair
						<input type="radio" name="preparation" value="3" >3 - Good
						<input type="radio" name="preparation" value="4" >4 - Excellent
						<input type="radio" name="preparation" value="5" >5 - Exceptional<br><hr><br> 
					<label for="willingness">Rate this group member on his/her WILLINGNESS to accept and complete tasks
						</label><br>
						<input type="radio" name="willingness" value="1" >1 - Poor
						<input type="radio" name="willingness" value="2" >2 - Fair
						<input type="radio" name="willingness" value="3" >3 - Good
						<input type="radio" name="willingness" value="4" >4 - Excellent
						<input type="radio" name="willingness" value="5" >5 - Exceptional<br><hr><br> 
					<label for="completion">Rate this group member on his/her COMPLETION of tasks ON TIME
						</label><br>
						<input type="radio" name="completion" value="1" >1 - Poor
						<input type="radio" name="completion" value="2" >2 - Fair
						<input type="radio" name="completion" value="3" >3 - Good
						<input type="radio" name="completion" value="4" >4 - Excellent
						<input type="radio" name="completion" value="5" >5 - Exceptional<br>	
					<!-- Submit survey result -->
					<div class="one"><input type="submit" value="Submit Evaluation" name="submitEval" id="submitEval"></div><br>
				</fieldset>
			</form>
		</div>
	</div>
	
	<footer>
			
	</footer>
	
</body>
</html>