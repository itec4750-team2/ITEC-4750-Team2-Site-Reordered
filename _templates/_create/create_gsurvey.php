<?php 

if($LoginID != 0){ // Must be logged in. Role is checked in DO

?>
<form name ="create-survey" method = "POST" class="form-horizontal col-centered col-sm-10">
	<fieldset>
	<div class="form-group">
		<label class="control-label col-sm-3" for="SurveyTitle">Enter Survey Title: </label>
		<div class="col-sm-6">
		<input type="text" name="SurveyTitle" id="SurveyTitle" class="form-control inputColor" required>
	</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3" for = "GroupID"> Group:</label>
		<div class="col-sm-6">
		<select id="form-select" name="GroupID" class="form-control inputColor" required>
			<option value="0" selected>Select Group</option>
			<?php 
				$dropdo = new DROP_DO();
				$groups = $dropdo->allGroups(); //Populate selection from all groups
				foreach($groups as $g){
					echo '<option value="'.$g['GroupID'].'">'.$g['GroupID'].'</option>';
				}
				?>
		</select>	
		</div>
		</div>
	
	<?php for ($i=1; $i<11; $i++){?>
		<div class="form-group">
		<label class="control-label col-sm-3" for="Questions[]">Q# <?php echo $i;?> </label></th>
			<div class="col-sm-6">
				<select id="form-select" name = "Questions[]" class="form-control inputColor" required>
				<option value="0" selected>Select Question</option>
					<?php 
						$dropdo = new DROP_DO();
						$rows=$dropdo->surveyQuestions();	// Populate selection from general survey data
						foreach($rows AS $q){
							echo ' <option value="'.$q['QuestionID'].'">'.$q['QuestionTxt'].'</option>';
						}
					?>
				</select>
			</div>
			</div>
		</tr>	
		<?php } ?>
		<div class="form-group">
		<input class="btn btn-primary btn-lg submit" type="submit" value="Submit" name="NewSurvey" id="NewSurvey">
		<?php if($Role="Faculty"){ ?>
		<a href="yoursurveys.php" class="btn btn-primary btn-lg submit" type="submit">Back to Surveys</a> <?php } ?>
		</div>
	</fieldset>
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