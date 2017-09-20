<?php
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
?>

<h2 class="center">ITEC Classes</h2>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<?php

		if(isset($_SESSION['LoginID'])){

		require("../_php/_objects/class_do.php");
		//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		//require("$root/_php/_objects/class_do.php");

		$classdo = new Class_DO($_SESSION['LoginID']);
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
					//calls class data object and loads table data
					//checks that Role='faculty'--KM 9/3/17
					$rows=$classdo->loadAll($_SESSION['LoginID']);

					//builds table with class data
					//links ID to information page where faculty can update or delete class --KM 9/3/17

					foreach ($rows as $value){
						echo '<td><a href="class_page.php?id='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>';
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