<h2 class="center">Your Students</h2>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
	<?php
			if(isset($_SESSION['LoginID'])){
				$FID = $_SESSION['LoginID'];
				$studo = new Stud_DO($FID);
				$rows=$studo->listmyStuds($FID);
	?>

	<div class="row">
		<div class="col-md-9 col-centered">
			<table class="table table-responsive">
				<thead>
					<tr>
						<th class="col-sm-1">Student ID</th>
						<th class="col-sm-2">Student Name</th>
						<th class="col-sm-3">Email</th>
						<th class="col-sm-1">ClassID</th>
						<th	class="col-sm-2">Surveys</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($rows as $value){
							echo '<td class="col-sm-1"><a href="../_facultyPages/stud_mgmt_pg.php?stid='.$value['LoginID'].'">'.$value['LoginID'].'</a></td>'; // link to class_page
							echo '<td class="col-sm-2"><a href="stud_mgmt_pg.php?stid=' . $value['LoginID'] . '">';
								echo 	$value['FName'] . ' ' . $value['LName'] . '</a></td>';
							echo '<td class="col-sm-3"><a href="mailto:' . $value['Email'].'">' . $value['Email'] . '</a></td>';
							echo '<td class="col-sm-1"><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>';
							echo '<td class="col-sm-2"><a href="indiv_survey_report.php?stid=' . $value['LoginID'].'">View Survey Report</a></td>';
							echo '</tr>';
						}?>
			  </tbody>	
			  </table>
					<?php 
					} // End if faculty logged in.
					else{
						echo '<div class = "error"> Only faculty can view this page.';
						echo '<br/>';
						echo '<a href="/login.php"'.'>Please Log In.</a>'; // Please Log In w/ link
					}
					?>
		</div>
	</div>
</div>
