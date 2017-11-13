<?php 
// Change Added Survey_List 10/29/17 KM
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');?>
<div class="col-md-7 col-centered">
	<table class="table table-striped">
		<thead>
			<tr>
				<!-- Row 1 -->
				<th>Group</th>
				<th>Class</th>
				<th>Survey Name</th>
				<th>Expires</th>
			</tr>
		</thead>
		<tbody>
			<?php	
			if($LoginID!=0){
				$surveydo = new Survey_DO();
				$rows=$surveydo->loadByLoginID($LoginID);
				// ------------- User's (faculty) Class Info Table ------------
				foreach ($rows as $value){
					echo '<tr>';
						echo '<td>';
						if($P=='yoursurveys_student'){
						echo '<a href="student_group_survey.php?gid='.$value['GroupID'].'&gsid='.$value['GSurveyID'].'">'.$value['GroupName'].'</a></td>';}
						else {echo '<a href="group_survey.php?gid='.$value['GroupID'].'&gsid='.$value['GSurveyID'].'">'.$value['GroupName'].'</a></td>';} 
						echo '</td>';
						echo '<td>';
							echo $value['ClassName'];
						echo '</td>'; 
						echo '<td>';
							echo $value['GSurveyName'];
						echo '</td>'; 
						echo '<td>';
							echo $value['ExpDate'];
						echo '</td>'; 
						
					echo '</tr>';
				}
			}
				?>
		</tbody>
	</table>
</div>