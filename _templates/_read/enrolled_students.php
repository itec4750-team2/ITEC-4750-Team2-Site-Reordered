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
			<h2>Currently Enrolled Students</h2>
				<table>
					<th>Student Name</th>
					<th>Email</th>
					<th>Group</th>
					<th>Remove<br/>From <br/>Class</th>
					<th>Delete<br/>Student</th>
					<th>Update<br/>Student</th>
					<?php 		
						foreach ($rows as $value){
							$Subj=$value['LoginID'];
							echo '<tr>';
								// Links student_mgt_pg to Name 
								echo '<td>' . '<a href="stud_mgmt_pg.php?stid=' . $value['LoginID'] . '">';
								echo 	$value['FName'] . ' ' . $value['LName'] . '</a></td>'; // links to student_mgt_pg for this student
								// Includes mail to email link
								echo '<td>' . '<a href="mailto:' . $value['Email'].'">' . $value['Email'] . '</a></td>';
								// ++++ Change: Created group_assignments as reusable module KM ++++ 
								include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/group_assignments.php');
								// ++++ Change: Added buttons delete profile, delete class assignment KM ++++ 
								echo '<td><a href="../../_templates/_delete/del_class_assignment.php?cid='.$ClassID.'&stid='.$value['LoginID'].'&p='.$P;
								echo 	'"><img class ="small_icon" src="../_images/person_delete.png" alt="Remove Student"></a></td>'; // delete class assignment						
								echo '<td>';
									echo '<a href="../../_templates/_delete/delete_profile.php?cid='.$ClassID.'&stid='.$value['LoginID'].'&p='.$P.'">';
									echo '<img class ="small_icon" src="../_images/delete.png" alt="Delete Student"></a>';// delete student
								echo '</td>'; 		
								echo '<td>';
									echo '<a href="stud_mgmt_pg.php?stid='.$value['LoginID'].'">';
									echo 	'<img class ="small_icon" src="../_images/update.png" alt="Update Student"></a>'; // update class
								echo '</td>';
							echo '</tr>';
						}	
					?>
				</table>
		  <?php } // End IF rows ?>
	 <?php }}// End IF Login && ClassID 

	