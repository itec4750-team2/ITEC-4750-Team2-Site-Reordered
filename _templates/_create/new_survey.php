<?php 
// Change Added new_survey template 10/29/17 KM
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/survey_model.php');

include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');

if($LoginID != 0){	
	if(!empty($GroupID)){
		$surveydo = new Survey_DO();
		$rows=$surveydo->loadByGroupID($LoginID, $GroupID, $GSurveyID);
		$i = 0;
		foreach($rows as $val){
			if($i==0){
				echo '<h3 class="center">'.$val['ClassName'].' - '.$val['GroupName'].': '.$val['GSurveyName'].'</h3>';
				echo '<br/>';
			$i++;
			}
		}
	?>	
			<!-- Drop down should list group members not evaluated. Default As from previous page -->
		<form name ="create-profile" method = "POST" >

		<table class="table-hover" id="table-hover">
			<tr>
			<h2>
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/survey_dd.php');
				?>	
			</h2>
			<hr id="table-caption"/>	
			</tr>
	
			<thead>
				<tr>
					<th class="col-sm-1">#</th>
					<th class="col-sm-7">Survey Question</th>
					<th class="col-sm-2">Response</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$surveydo2 = new Survey_DO();
				$rows=$surveydo2->loadByGroupID($LoginID, $GroupID, $GSurveyID);
				
				foreach ($rows as $value){?>
					<tr>
						<td class="col-sm-1">
							<?php echo $value['QuestionNum']; ?>
						</td>
						<td class="col-sm-7">
						  <input type="hidden" name="Q[]" value=<?php echo $value['QuestionID'];?>>
							
							<?php echo $value['QuestionTxt'].'?';?>
						</td>
						<td class="col-sm-2">
							<select  id="form-select" class="form-control inputColor" name="ResponseVal[]"  required >
							  <option value="" selected>Select Response</option>
							  <option value="1">Excellent</option>
							  <option value="2">Good</option>
							  <option value="3">Okay</option>
							  <option value="4">Poor</option>
							  <option value="5">Awful</option>
							  </select>
						</td>
					</tr>			
<?php
				}
}}
?>
			</tbody>
	</table>
	<br/>
	<input class="btn btn-primary btn-lg submit" type="submit" value="Finish" name="AddSurvey" id="AddSurvey">
	</form>
	<?php 
		$aSurvey = new Survey_DO();
		if(isset($_POST['AddSurvey'])){
			$ResponseVal=$_POST['ResponseVal'];
			$Q=$_POST['Q'];
			$size=sizeof($ResponseVal);
			for($i=0;$i<$size;$i++)
			{
				//echo $ResponseVal[$i];
				//echo $Q[$i];
				
				$aSurvey = new Responses(array(
				'LoginID' => $LoginID,
				'Subj' => $_POST['SurveyID'],
				'GSurveyID' => $GSurveyID,
				'QuestionID' => $Q[$i],
				'ResponseValue' => $ResponseVal[$i],
				'GroupID' => $GroupID));
				$aSurvey->addSurvey();			
			}
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/unevaluated_list.php');
			//If all team members evaluated return to yoursurveys_student page.
			
			if( $i==$size && $Role=='Student' && $GMLength>1){
				echo "<script>window.open('../../../_studentPages/student_group_survey.php?gid=".$GroupID."&gsid=". $GSurveyID . "', '_self') </script>";
			}
			else if($i==$size && $GMLength<2 && $Role=='Student'){
				echo "<script>window.open('../../../_studentPages/yoursurveys_student.php', '_self') </script>";
			}
			}?>
			
	
	</div>