<!-- ++++ Change: Moved MySql out of page. Replaced with dropbox from drop_do 9/8 KM ++++ -->
<label for="SurveyID">Member to Survey: </label>	
<?php
	// -- calls dropdown box  --  drop_do.php
	// -- lists all semesters for instructor to choose from.
	// -- could do similar for class names 
	$dropdo = new Drop_DO();
	$rows=$dropdo->surveyDrop($LoginID, $GSurveyID, $GroupID);
	echo '<select name="SurveyID" required>'; // Open
	// -- Pass Value to Auto Select
	if(isset($Subj)){echo '<option value="'.$Subj.'" selected>'.$FName.' '.$LName.'</option>'; }
	else{ echo '<option value="" selected>Select Team Member</option>';}
		foreach ($rows as $ddo) {
		  echo '<option value="'.$ddo['LoginID'].'">'.$ddo['FName'].' '.$ddo['LName'].'</option>';
		}
	echo '</select>';// Close
?>
