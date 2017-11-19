<?php
	// ++++ Change: Added Group Member Drop Down that lists unevaluated team-members 11/5 KM ++++
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/unevaluated_list.php');
	// Start Select Box
	?>
	<label class="control-label col-sm-4" for="SurveyID">Member to Survey: </label>
	<div class="col-sm-5">
	<select id="form-select" name="SurveyID" class="form-control inputColor" required>
	<?php
	// Pass $Subj Value from page to Default to selected.
	if(isset($Subj)){echo ' <option value="'.$Subj.'" selected>'.$FName.' '.$LName.'</option>'; }
	
	
	// Default Select behavior
	else{ echo ' <option value="" selected>Select Team Member</option>';}
		
		// Step through groupMember array
		for($k=0; $GMLength>=$k; $k++){
			// Set login for remaining group members (excepting user's profile)
			if($LoginID!=$groupMembers[$k]){
				$thisLoginID=$groupMembers[$k];	//echo $groupMembers[$k]. ' ';
				// Get groupMember Profile Data
				$profileInfo=$profiledo->listProfile($thisLoginID);	// Populate selection from profile data
				foreach($profileInfo AS $p){
					echo ' <option value="'.$p['LoginID'].'">'.$p['FName'].' '.$p['LName'].'</option>';
				}
			}
		}
	// Close Select
	?>	
	</select>
	</div>
	
	

