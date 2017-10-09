<?php 
// ++++ Change: Added Reusable Module to list students. 9/30 KM ++++
// CA_DO is called from originating page.
?>	

<?php	
	// Lists student's assigned to a class.
		// ++++ Change: Corrected Students without Groups are now listed. KM ++++
	if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
	if(isset($_SESSION['LoginID'])){
		 if(!empty($ClassID )){
		
			$cado = new CA_DO();
			$rows=$cado->listClassStuds($ClassID);
			if(!empty($rows)){
?>					
			<h2>Currently Enrolled Students</h2>
				<table>
					<th>Student Name</th>
					<th>Email</th>
					<th>Group</th>
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
							echo '</tr>';
						}	
					?>
				</table>
		  <?php } // End IF rows ?>
	 <?php }}// End IF Login && ClassID 
	if(empty($ClassID)){echo "No ClassID Found.";}
	if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>';}?>

	