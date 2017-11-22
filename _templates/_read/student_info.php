<!-- ------------- Student Account Info ----------->
<?php
// ++++ Change: Added Check for IDs module 10/8KM ++++
// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/overall_rating.php');
if($LoginID != 0){//Logged in
	if(empty($StID)){echo '<div class="error">No Student ID</div>';}
	if(!empty($StID)){
		?>
<div class="row">
<div class="col-md-5 col-centered">
<table class="table table-responsive">
<!--<caption id="table-caption">Student Information</caption>-->
		<?php
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
			<tr><th>Survey Rating</th><td><?php echo '<a href="indiv_survey_report.php?stid='. $value['LoginID'].'">'.$overall.'</a></td>';?>
			</table>
			<br/>
			<br/>
	<?php } ?>	<!-- Ends student foreach -->
		<!-- ++++ Change: Link added to update student profile info. 9/9 KM ++++ -->
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
}//logged in
?>
</table>
</div>
</div>