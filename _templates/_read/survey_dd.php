<?php
	// ++++ Change: Added Group Member Drop Down that lists unevaluated team-members 11/5 KM ++++
	$members='';
	$groupMembers=array();
	$evaluatedMembers=array();
	$GMLength=0;
	
	// Get evaluated list	
	$dropdo=new Drop_DO();
	$compSurveys=$dropdo->completedSurveys($LoginID, $GroupID, $GSurveyID);
	
	// Get groupmembers list
	$dropdo=new Drop_DO();
	$groupList=$dropdo->studentGroups($GroupID);
	
	// Set profile object
	$profiledo=new Profile_DO();
	
	// Get GroupMember List
	$i=0;		
	foreach($groupList as $g){
		$members=$g['LoginID'];
		$groupMembers[$i]=$members;
		$i++;
		}
	
	// Get evaluated List
	$j=0;
	foreach($compSurveys as $e){
		$members=$e['TeamMemberID'];
		$evaluatedMembers[$j]=$members;
		$j++;
	}
	
	// Compare and remove evaluated from Grouplist
	$groupMembers=array_values(array_diff($groupMembers, $evaluatedMembers));	
	
	//print_r($groupMembers);
	
	// Get $groupMember array length
	$GMLength=count($groupMembers);
	
	// Start Select Box
	echo '<label for="SurveyID">Member to Survey: </label>';
	echo '<select name="SurveyID" required>'; // Open
	
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
	echo '</select>';
	
?>
