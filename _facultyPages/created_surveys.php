<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Surveys';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='yoursurveys';
	
if(isset($_SESSION['LoginID'])){	
	if(isset($_GET['gid'])){
		$LoginID=$_SESSION['LoginID'];
		$GroupID=$_GET['gid'];
		$surveydo = new Survey_DO();
		$rows=$surveydo->loadByGroupID($LoginID, $GroupID);
		$i = 0;
		foreach($rows as $val){
			if($i==0){
				echo '<h2 class="center">'.$val['ClassName'].' - '.$val['GroupName'].'</h2>';
				echo '<h3 class="center">'.$val['GSurveyName'].'</h3>';
			$i++;
			}
		}
		
		?>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-7 col-centered">
			<table class="table table-striped">
				<thead>
					<tr>
						<!-- Row 1 -->
						<th>Q #</th>
						<th>Survey Question</th>
					</tr>
				</thead>
				<tbody>
					<?php
							foreach ($rows as $value){
								echo '<tr>';
									echo '<td>';
										echo $value['QuestionNum']; 
									echo '</td>';
									echo '<td>';
										echo $value['QuestionTxt'].'?';
									echo '</td>'; 
								echo '</tr>';
							}
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