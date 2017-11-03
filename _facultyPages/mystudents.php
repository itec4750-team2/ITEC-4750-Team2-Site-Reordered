<?php
// ++++ Change: Added My Students Page 9/24 KM ++++
// ++++ Change: Added Title 10/25 KM ++++
$title = 'My Students';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='mystudents';
?>

<h2 class="center">Your Students</h2>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<?php
			if(isset($_SESSION['LoginID'])){
				$FID = $_SESSION['LoginID'];
				$studo = new Stud_DO($FID);
				$rows=$studo->listmyStuds($FID);
	?>

	<div class="row">
		<div class="col-md-7 col-centered">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Student ID</th>
						<th>Student Name</th>
						<th>Email</th>
						<th>ClassID</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($rows as $value){
							echo '<td><a href="../_facultyPages/stud_mgmt_pg.php?stid='.$value['LoginID'].'">'.$value['LoginID'].'</a></td>'; // link to class_page
							echo '<td><a href="stud_mgmt_pg.php?stid=' . $value['LoginID'] . '">';
								echo 	$value['FName'] . ' ' . $value['LName'] . '</a></td>';
							echo '<td><a href="mailto:' . $value['Email'].'">' . $value['Email'] . '</a></td>';
							echo '<td><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td></tr>';
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

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>

</body>
</html>