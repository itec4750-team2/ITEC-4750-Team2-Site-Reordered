<?php
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
if($LoginID!=0){?>
	<h2 class="center">Your Students</h2>
<?php
	$LoginID = $_SESSION['LoginID'];
	//Get from surveys
	$surveydo = new Survey_DO();
	$rows=$surveydo->loadCompleted($LoginID, $GSurveyID);
?>
	<div class="row">
		<div class="col-md-9 col-centered">
			<table class="table table-responsive">
				<thead>
					<tr>
						<th class="col-sm-3">Team-member Name</th>
						<th	class="col-sm-3">Completed Surveys</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($rows as $value){
							echo '<tr>';
							echo '<td class="col-sm-3"><a href="edit_survey.php?stid='.$value['TeamMemberID'].'&gid='.$value['GroupID'].'&gsid='.$value['GSurveyID'].'">';
								echo $value['FName'] . ' ' . $value['LName'] . '</a></td>';
							echo '<td class="col-sm-3"><a href="edit_survey.php?stid='.$value['TeamMemberID'].'&gid='.$value['GroupID'].'&gsid='.$value['GSurveyID'].'">';
								echo $value['GSurveyName'].'</a></td>';
							echo '</tr>';
						}?>
						
			  </tbody>	
			  </table>
				<?php if($Role=="Student"){?>
					<a class="btn btn-primary btn-lg submit" href="../../../_studentPages/yoursurveys_student.php">Surveys Menu</a><?php }?>
				<?php if($Role=="Faculty"){?>
					<a class="btn btn-primary btn-lg submit" href="../../../_facultyPages/yoursurveys.php">Surveys Menu</a><?php }?>
		</div>
	</div>
<?php 
}
		

