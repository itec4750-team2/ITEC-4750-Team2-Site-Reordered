<?php 
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Classes';
include('../_templates/_headers/studentHeader.php');
include('../_templates/_nav/studentNav.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');	
?>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
	<h2 class="center">Your Classes</h2>
<?php
if($LoginID!=0){
	$classdo = new Class_DO();
?>
	<div class="row">
		<div class="col-md-10 col-centered table-responsive">		
			<table class="table-responsive">
				<thead>
					<tr>
						<th class="col-sm-1">ID</th>
						<th class="col-sm-2">Number</th>
						<th class="col-sm-5">Name</th>
						<th class="col-sm-1">Semester</th>
						<th class="col-sm-2">Expire Date</th>
					</tr>
					</thead>
				<tbody>
				<?php
				//calls class data object and loads table data by LoginID
				$rows=$classdo->loadByLoginID($_SESSION['LoginID']);

				//builds table with class data	
				foreach ($rows as $value){
					echo '<tr>';
					echo '<td class="col-sm-1">'.$value['ClassID'].'</td>';
					echo '<td class="col-sm-2">'.$value['ClassNO'].'</td>';
					echo '<td class="col-sm-5">'.$value['ClassName'].'</td>';
					echo '<td class="col-sm-1">'.$value['SemesterName']. ' '.$value['Year'].'</td>';
					echo '<td class="col-sm-2">'. $value['ExpDate'].'</td>';
					echo '</tr>';
				}
				?>		
				</tbody>
			</table>
		</div>
	</div>
<br/>
<br/>
<?php 
}
include("../_templates/_footers/footer.php");?>
</body>
</html>