<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
?>

<h2 class="center">Your Classes</h2>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
<?php

	if(isset($_SESSION['LoginID'])){

	require("../_php/_objects/class_do.php");
	//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	//require("$root/_php/_objects/class_do.php");

	$classdo = new Class_DO();
	}
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
					</tr>
				</thead>
				<tbody>
					<?php
						// ------------- Get Class Data --------------
						if(isset($_SESSION['LoginID'])){
							$classdo = new Class_DO();
							$rows=$classdo->loadByLoginID($_SESSION['LoginID']);
							// ------------- User's (faculty) Class Info Table ------------
							foreach ($rows as $value){
								echo '<tr>';
								echo '<td><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>'; // links back to class_page.php
								echo '<td>'.$value['ClassNO'].'</td>';
								echo '<td>'.$value['ClassName'].'</td>';
								echo '<td>'.$value['SemesterName'].' '.$value['Year'].'</td>';
								echo '<td>'.$value['ExpDate'].'</td>';
								echo '</tr>';
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>

</body>
</html>
