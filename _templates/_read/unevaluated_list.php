<?php

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
	
	?>