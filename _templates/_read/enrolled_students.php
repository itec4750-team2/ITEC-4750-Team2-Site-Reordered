<?php 
// ++++ Change: Added Reusable Module to list students. 9/30 KM ++++
// CA_DO is called from originating page.
?>	

<?php	
	// Lists student's assigned to a class.
	// ++++ Change: Corrected Students without Groups are now listed. KM ++++
	// ++++ Change: Added Check for IDs module 10/8KM ++++
	// Gets IDs
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
	if($LoginID != 0){
		 if(!isset($ClassID) || empty($ClassID)){echo '<div class="error">No ClassID Found.</div>';}	
		 if(!empty($ClassID)){
			$cado = new CA_DO();
			$rows=$cado->listClassStuds($ClassID);
			if(!empty($rows)){
?>			
			<div class="row">
			<div class="col-md-9 col-centered table-responsive">			
				<table class="table-responsive">
				<thead>
				<caption id="table-caption">Currently Enrolled Students
					</caption>
					<th class="col-sm-3">Student Name</th>
					<th class="col-sm-3">Email</th>
					<th class="col-sm-2">Group</th>
					<th class="col-sm-1">Remove<br/>From <br/>Class</th>
					<th class="col-sm-1">Delete<br/>Student</th>
					<th class="col-sm-1">Update<br/>Student</th>
				</thead>
				<tbody>
					<?php 		
						foreach ($rows as $value){
							$Subj=$value['LoginID'];
							echo '<tr>';
								// Links student_mgt_pg to Name 
								echo '<td class="col-sm-3">' . '<a href="stud_mgmt_pg.php?stid=' . $value['LoginID'] . '">';
								echo 	$value['FName'] . ' ' . $value['LName'] . '</a></td>'; // links to student_mgt_pg for this student
								// Includes mail to email link
								echo '<td class="col-sm-3">' . '<a href="mailto:' . $value['Email'].'">' . $value['Email'] . '</a></td>';
								
								// ++++ Change: Created group_assignments as reusable module KM ++++ 
									include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/group_assignments.php');
								
								// ++++ Change: Added buttons delete profile, delete class assignment KM ++++ 
								echo '<td class="col-sm-1"><a href="../../_templates/_delete/del_class_assignment.php?cid='.$ClassID.'&stid='.$value['LoginID'].'&p='.$P;
								echo 	'"><img class ="small_icon" src="../_images/person_delete.png" alt="Remove Student"></a></td>'; // delete class assignment						
								echo '<td class="col-sm-1">';
									echo '<a href="../../_templates/_delete/delete_profile.php?cid='.$ClassID.'&stid='.$value['LoginID'].'&p='.$P.'">';
									echo '<img class ="small_icon" src="../_images/delete.png" alt="Delete Student"></a>';// delete student
								echo '</td>'; 		
								echo '<td class="col-sm-1">';
									echo '<a href="stud_mgmt_pg.php?stid='.$value['LoginID'].'">';
									echo 	'<img class ="small_icon" src="../_images/update.png" alt="Update Student"></a>'; // update class
								echo '</td>';
							echo '</tr>';
						}	
					?>
					</tbody>
				</table>
		  <?php } // End IF rows ?>
	 <?php }}// End IF Login && ClassID 

	