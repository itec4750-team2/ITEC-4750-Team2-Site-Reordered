<?php ?>
<!-- ++++ Change: Created list module for reuse 10/1 KM ++++ -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<?php
			if(isset($_SESSION['LoginID'])){
				$FID = $_SESSION['LoginID'];
				$studo = new Stud_DO($FID);
				$rows=$studo->listAll($FID);
	?>

	<div class="row">
		<div class="col-md-7 col-centered">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Student ID</th>
						<th>Student Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($rows as $value){
							echo '<td><a href="../_facultyPages/stud_mgmt_pg.php?stid='.$value['LoginID'].'">'.$value['LoginID'].'</a></td>'; // link to class_page
							echo '<td>'.$value['FName'].' '.$value['LName'].'</td>';
							echo '<td>'.$value['Email'].'</td>';
							echo '<td></td></tr>';
						}
		   echo '</tbody>';
		   echo '</table>';
		   
					} // End if faculty logged in.
					else{
						echo '<div class = "error"> Only faculty can view this page. <br/> Please log in... </div>';
					}
					?>
		</div>
	</div>
</div>
