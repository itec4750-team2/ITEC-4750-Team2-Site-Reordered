<?php 

if($LoginID != 0){ // Must be logged in. Role is checked in DO

?>
<form name ="create-survey" method = "POST">
	<div class="container">
	<table>
	<tr>
		<th><label for="SurveyTitle">Enter Survey Title: </label></th>
		<td><input type="text" name="SurveyTitle" id="SurveyTitle"></td>
	</tr>
	<tr>
		<th><label for = "GroupID"> Group:</label></th>
		<td>
		<select name="GroupID" id="GroupID">
			<option value="0" selected>Select Group</option>
			<?php 
				$dropdo = new DROP_DO();
				$groups = $dropdo->allGroups(); //Populate selection from all groups
				foreach($groups as $g){
					echo '<option value="'.$g['GroupID'].'">'.$g['GroupID'].'</option>';
				}
				?>
		</select>	
		</td>
	</tr>	
	<?php for ($i=1; $i<11; $i++){?>
		<tr>
			<th><label for="Questions[]">Q# <?php echo $i;?> </label></th>
			<td>
				<select name = "Questions[]" id="Questions"><option value="0" selected>Select Question</option>
					<?php 
						$dropdo = new DROP_DO();
						$rows=$dropdo->surveyQuestions();	// Populate selection from general survey data
						foreach($rows AS $q){
							echo ' <option value="'.$q['QuestionID'].'">'.$q['QuestionTxt'].'</option>';
						}
					?>
				</select>
			</td>
		</tr>	
		<?php } ?>
		</table>
	</div>
	<br/>
	<div>
		<input class="btn btn-default" type="submit" value="Submit" name="NewSurvey" id="NewSurvey">
		<a href="yoursurveys.php" class="btn btn-default">Back to Surveys</a>
	</div>
	</form>
	<?php 
	//Add a new survey in survey_do
		
		
		if(isset($_POST['NewSurvey']) && $Role=='Faculty'){	
			$LoginID = $_SESSION['LoginID'];
			$GSurveyName=$_POST['SurveyTitle'];
			$GroupID=$_POST['GroupID'];
			
			$nSurvey = new Survey_DO();
			$GSurveyID = $nSurvey -> addNewSurvey($LoginID, $GSurveyName);
			
			$gSurvey = new Survey_DO();	
			$Questions=$_POST['Questions'];
			$size=sizeof($Questions);	
			for($i=0;$i<$size;$i++){
				if($Questions[$i] != '0'){
					$gSurvey = new Survey(array(
					'LoginID' => $LoginID,
					'GSurveyID' => $GSurveyID,
					'GSurveyName' => $GSurveyName,
					'QuestionNum' => $i+1, //Number for survey
					'QuestionTxt' => '', //Not used (selected), will be used for adding questions.
					'QuestionID' => $Questions[$i], //Value selected
					'GroupID' => $GroupID ));	
					$gSurvey->addGroupSurvey();				
				}
			}
			if( $i==$size && $Role=='Faculty'){
				echo "<script>window.open('../../../_facultyPages/yoursurveys.php?', '_self') </script>";
			}
			
			}?>
<?php }?>