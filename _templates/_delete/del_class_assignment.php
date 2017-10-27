<?php	

// Supports stud_mgmt_pg, class_page
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
$P = 'del_class_assignment';

// ++++ Change: Added Check for IDs module 10/8KM ++++
// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');

if($LoginID != 0){ //logged in
	if(!isset($ClassID) || empty($ClassID)){ echo '<div class="error">No Class ID</div>';}
	if(!empty($ClassID)){ // class id
		
		// ++++ Change: Remove Group Assignment while removing student from class 10/8 KM ++++		
		//Check for Group Assignment & Remove each group_assignment for students only.
		if(!empty($StID)){	
			//include del_group_assignment
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_delete/del_group_assignment.php');
		}
		
		$DeleteClassA = new Class_Assign(array( 
			'Subj' => $Subj, 
			'LoginID' => $LoginID, 
			'ClassID' => $ClassID));	
		$DeleteClassA->delClassA();
		if($DeleteClassA){
			$StID = ''; 
			$Subj = '';
			// ++++ Change: Added Check for sending page module 10/8KM ++++
			// Gets sending page and redirects
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getPage-Fac.php');
		}
	}
}
?>