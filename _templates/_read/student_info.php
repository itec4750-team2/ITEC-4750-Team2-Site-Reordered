<table>

<!-- ------------- Student Account Info ----------->
<?php
if(isset($_GET['stid'])){$StID = $_GET['stid'];}
if(empty($StID)){echo '<div class="error">No Student ID</div>';}
if(!empty($StID)){
	$students = new Stud_DO();	
	$rows=$students->listStud($StID);
	foreach ($rows as $value){
		$FName = $value['FName'];
		$LName = $value['LName'];
		$Email = $value['Email'];		
		?>
		<tr><th>Student Name</th><td><?php echo  $FName. ' ' . $LName;?></td></tr>
		<tr><th>Student ID </th><td><?php echo $StID;?></td></tr>
		<tr><th>Email</th><td><?php echo '<a href="mailto:' . $Email.'">' . $Email . '</a>';?></td></tr>
		</table>
		<br/>
		<br/>	
<?php } ?>

	<!-- Ends student foreach -->  
	<!-- ++++ Change: Link added to update student profile info. 9/9 KM ++++ -->
	<!-------------------- Update Student Profile Link ------------------->
	<!---- Should be enhanced visually maybe an image button like dashboard ? --> 
	<?php 
	if(!empty($P)){
	if($P == 'student_mgmt_pg' || $P == 'add_student'){
	?>	<span>
		<?php 
		echo '<a href="../../_facultyPages/update_student.php?&stid='.$StID.'">';
		echo '<img class ="med_icon" src="../../_images/person_edit.png" alt="Edit Profile"></a>';?>
		<br/>
		<?php echo '<a href="../../_facultyPages/update_student.php?&stid='.$StID.'">Update Student Profile</a>';?> 
		</span>
		<?php 
	}}
} //End !empty $StID
?>
</table>