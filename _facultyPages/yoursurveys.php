<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Surveys';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='yoursurveys';
?>

<h2 class="center">Your Created Surveys</h2>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-7 col-centered">
			<table class="table table-striped">
				<thead>
					<tr>
						<!-- Row 1 -->
						<th>Survey Title</th>
						<th>Class</th>
						<th>Expires</th>
					</tr>
				</thead>
				<tbody>
					<?php	
					if(isset($_SESSION['LoginID'])){
						$surveydo = new Survey_DO();
						$rows=$surveydo->loadByLoginID($_SESSION['LoginID']);
						// ------------- User's (faculty) Class Info Table ------------
						foreach ($rows as $value){
							echo '<tr>';
								echo '<td>';
									echo '<a href="created_surveys.php?gid='.$value['GroupID'].'">'.$value['GroupName'].'</a></td>'; 
								echo '</td>';
								echo '<td>';
									echo $value['ClassName'];
								echo '</td>'; 
								echo '</td>';
								echo '<td>';
									echo $value['ExpDate'];
								echo '</td>'; 
								echo '</td>';
							echo '</tr>';
						}
					}
						?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>

</body>
</html>