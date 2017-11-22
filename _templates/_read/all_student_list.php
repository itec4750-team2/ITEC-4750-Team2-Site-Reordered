<?php ?>
<!-- ++++ Change: Created list module for reuse 10/1 KM ++++ -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<?php
	// ++++ Change: Added Check for IDs module 10/8KM ++++
	
	// Gets IDs
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
	
	if($LoginID != 0){ // Logged in
		$FID = $_SESSION['LoginID']; // Role Checked in DO
		$studo = new Stud_DO($FID);
		$rows=$studo->listAll($FID);
	?>

	<div class="row">
		<div class="col-md-7 col-centered">
			<table class="table table-responsive">
				<thead>
					<tr>
						<th class="col-sm-1">Student ID</th>
						<th class="col-sm-2">Student Name</th>
						<th class="col-sm-4">Email</th>
						<th class="col-sm-1">Delete <br/>Student</th>
						<th class="col-sm-1">Update <br/>Student</th>
						
					</tr>
				</thead>
				<tbody>			
					<?php
					// ++++ Change: Added Delete Student Button 10/8 KM ++++
					// ++++ Change: Added UPDATE Profile Button 10/10 KM ++++
						foreach ($rows as $value){
							echo '<tr>';
								echo '<td class="col-sm-1">';
									echo '<a href="../_facultyPages/stud_mgmt_pg.php?stid='.$value['LoginID'].'">'.$value['LoginID'].'</a>';// link to student_mgmt_pg
								echo '</td>'; 
								echo '<td class="col-sm-2">';
								echo '<a href="../_facultyPages/stud_mgmt_pg.php?stid='.$value['LoginID'].'">'.$value['FName'].' '.$value['LName'].'</a>';// link to student_mgmt_pg
								echo '</td>';
								echo '<td class="col-sm-4">'.$value['Email'].'</td>';
								echo '<td class="col-sm-1">';
									echo '<a href="../../_templates/_delete/delete_profile.php?stid='.$value['LoginID'].'&p='.$P.'">';
									echo '<img class ="small_icon" src="../_images/delete.png" alt="Delete Student"></a>';// delete student
								echo '</td>'; 
								echo '<td class="col-sm-1">';
									echo '<a href="stud_mgmt_pg.php?stid='.$value['LoginID'].'">';
									echo 	'<img class ="small_icon" src="../_images/update.png" alt="Update Profile"></a>'; // update profile
								echo '</td>';
							echo '</tr>';	
						}?>			   
			   </tbody>
			</table>
		<?php
		} // End if faculty logged in.

		?>
		</div>
	</div>
</div>
