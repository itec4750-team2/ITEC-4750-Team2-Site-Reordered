<?php	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/group_assign_model.php');

// Change: Added Group Removal with Class Removal Students 10/8 KM ++++
//If sending page is delete_class_assignment
if(isset($P)){
	if($P == 'del_class_assignment'){
		$gado = new GA_DO();
		$rows=$gado->groupsByLogin($Subj, $ClassID);
		//if group assignment exists
		foreach ($rows as $value){
			$LoginID = $_SESSION['LoginID'];
			$Subj = $value['LoginID'];
			$GroupID = $value['GroupID'];
			echo $LoginID;
			echo $Subj;
			echo $GroupID;
			
			$DeleteGroupA = new Group_Assign(array(
			'Subj' => $Subj, 
			'LoginID' => $LoginID, 
			'GroupID' => $GroupID));	
			$DeleteGroupA->delGroupA();
		}
}

}//$P
$P=$_GET['p'];
// Change: Separated remove group only from remove group with class remove. 10/8 KM
//If sending page is not delete_class_assignment
if($P == 'stud_mgmt_pg'){
	// Supports stud_mgmt_pg
	include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');	
	
	// ++++ Change: Added Check for IDs module 10/8KM ++++
	// Gets IDs
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
	
	if($LoginID != 0){ // logged in
		if(!empty($Subj) && !empty($GroupID)){ // subj && GroupID
			$DeleteGroupA = new Group_Assign(array(
				'Subj' => $Subj, 
				'LoginID' => $LoginID, 
				'GroupID' => $GroupID));	
			$DeleteGroupA->delGroupA();
		
			// ++++ Change: Added Check for sending page module 10/8KM ++++
			// Gets sending page and redirects
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getP-Fac.php');
		}
	}
}

?>