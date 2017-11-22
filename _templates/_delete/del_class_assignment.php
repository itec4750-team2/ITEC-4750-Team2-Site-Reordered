<?php	
// ++++ Change: Added Check for IDs module 10/8KM ++++
// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
// Supports stud_mgmt_pg, class_page
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
if(!isset($_SESSION['LoginID'])){include($_SERVER['DOCUMENT_ROOT'].'/_php/session.php');}
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');

if(isset($_GET['p'])){$p=$_GET['p'];}
$P = 'del_class_assignment';
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
			if($p!="stud_mgmt_pg"){
			$StID = ''; 
			$Subj = '';
			}
			// ++++ Change: Added Check for sending page module 10/8KM ++++
			// Gets sending page and redirects
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getPage-Fac.php');
		}
	}
}
?>