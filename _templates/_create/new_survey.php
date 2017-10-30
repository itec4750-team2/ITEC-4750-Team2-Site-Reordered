<?php 
// Change Added new_survey template 10/29/17 KM
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/survey_model.php');
?>
<?php
if($LoginID !=0){	
	if(!empty($GroupID)){
		if(isset($_GET['gsid'])){$GSurveyID = $_GET['gsid'];}
		$surveydo = new Survey_DO();
		$rows=$surveydo->loadByGroupID($LoginID, $GroupID);
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
		<table class="table table-striped">
			<legend>
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/survey_dd.php');?>
			</legend>
			<thead>
				<tr>
					<th>#</th>
					<th>Survey Question</th>
					<th>Response</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$surveydo2 = new Survey_DO();
				$rows=$surveydo2->loadByGroupID($LoginID, $GroupID);
				
				foreach ($rows as $value){?>
					<tr>
						<td>
							<?php echo $value['QuestionNum']; ?>
						</td>
						<td>
						  <input type="hidden" name="Q[]" value=<?php echo $value['GroupQID'];?>>
							
							<?php echo $value['QuestionTxt'].'?';?>
						</td>
						<td>
							<select required name="ResponseVal[]" >
							  <option value="" selected>Select Response</option>
							  <option value="1">Excellent</option>
							  <option value="2">Good</option>
							  <option value="3">Okay</option>
							  <option value="4">Poor</option>
							  <option value="5">Awful</option>
							  </select>
						</td>
						<td>
					</tr>			
<?php
				}
}}
?>
		</tbody>
	</table>
	<input type="submit" value="Finish" name="AddSurvey" id="AddSurvey">
	</form>
	<?php 
		$aSurvey = new Survey_DO();
		if(isset($_POST['AddSurvey'])){
			$ResponseVal=$_POST['ResponseVal'];
			$Q=$_POST['Q'];
			$size=sizeof($ResponseVal);
			for($i=1;$i<$size;$i++)
			{
				//echo $ResponseVal[$i];
				//echo $Q[$i];
				
				$aSurvey = new Survey(array(
				'LoginID' => $LoginID,
				'Subj' => $_POST['SurveyID'],
				'GSurveyID' => $GSurveyID,
				'GroupQID' => $Q[$i],
				'ResponseValue' => $ResponseVal[$i],
				'GroupID' => $GroupID,
				'Taken' => 1,
				'Round' => $i));
				$aSurvey->addSurvey();
				
			}
				
			}?>
	
	</div>