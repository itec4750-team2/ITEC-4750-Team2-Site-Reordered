<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
?>

<h2 class="center">ITEC Classes</h2>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<?php
			if(isset($_SESSION['LoginID'])){
				$classdo = new Class_DO($_SESSION['LoginID']);
				$rows=$classdo->loadAll($_SESSION['LoginID']);
	?>

	<div class="row">
		<div class="col-md-7 col-centered">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Class ID</th>
						<th>Class Number</th>
						<th>Class Name</th>
						<th>Semester</th>
						<th>Class Expire Date</th>
						<!-- ++++ Change: Added Leave Class 9/29 KM ++++-->
						<th>Delete <br/> Class</th>
						<th>Update <br/> Class</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($rows as $value){
							echo '<td><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>'; // link to class_page
							echo '<td>'.$value['ClassNO'].'</td><td>'.$value['ClassName'].'</td>';
							echo '<td>'.$value['SemesterName']. ' '.$value['Year'].'</td>';
							echo '<td>'. $value['ExpDate'].'</td>';
							// -- ++++ Change: Added Delete Class & Update Class Buttons 9/29 KM ++++
							echo '<td><a href="../_facultyPages/delete_class.php?cid='.$value['ClassID'];
							echo 	'"><img class ="small_icon" src="../_images/delete.png" alt="Delete Class"></a></td>'; // delete class
							echo '<td><a href="../_facultyPages/update_class.php?cid='.$value['ClassID'];
							echo 	'"><img class ="small_icon" src="../_images/update.png" alt="Update Class"></a></td>'; // update class
							echo '</tr>';
						}
				echo '</tbody></table>';
					} // End if faculty logged in.
					// ++++ Change: Added error msg for no $_SESSION['LoginID'] 9/8 KM ++++
					else{
						echo '<div class = "error"> Only faculty can view this page. <br/> Please log in... </div>';
					}
					?>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>

</body>
</html>