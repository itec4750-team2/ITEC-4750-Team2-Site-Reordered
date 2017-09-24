<?php
include('../_templates/studentHeader.php');
include('../_templates/studentNav.php');
require("../_php/_objects/class_do.php");
	//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	//require("$root/_php/_objects/class_do.php");
?>

<h2 class="center">Your Classes</h2>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
<?php
	if(isset($_SESSION['LoginID'])){
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
						//calls class data object and loads table data by LoginID
						$rows=$classdo->loadByLoginID($_SESSION['LoginID']);

						//builds table with class data
						foreach ($rows as $value){
							echo "<tr><td>".$value['ClassID']."</td>";
							echo "<td>".$value['ClassNO']."</td><td>".$value['ClassName']."</td>";
							echo "<td>".$value['SemesterName']. " ".$value['Year']."</td>";
							echo "<td>". $value['ExpDate']."</td></tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include("../_templates/footer.php");?>
</body>
</html>