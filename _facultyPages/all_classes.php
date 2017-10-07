<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
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
	<!-- ++++ Change: Added Leave Class Button 9/29 KM ++++-->
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
					<th>Delete <br/> Class</th>
					<th>Update <br/> Class</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// -- ++++ Change: Added Delete Class & Update Class Buttons 9/29 KM ++++
				foreach ($rows as $value){
					echo '<td><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>'; // link to class_page
					echo '<td>'.$value['ClassNO'].'</td><td>'.$value['ClassName'].'</td>';
					echo '<td>'.$value['SemesterName']. ' '.$value['Year'].'</td>';
					echo '<td>'. $value['ExpDate'].'</td>';
					echo '<td><a href="../_facultyPages/delete_class.php?cid='.$value['ClassID'];
					echo 	'"><img class ="small_icon" src="../_images/delete_class.png" alt="Delete Class"></a></td>'; // delete class
					echo '<td><a href="../_facultyPages/update_class.php?cid='.$value['ClassID'];
					echo 	'"><img class ="small_icon" src="../_images/update.png" alt="Update Class"></a></td>'; // update class
					echo '</tr>';
				}
	echo '</tbody></table>';
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