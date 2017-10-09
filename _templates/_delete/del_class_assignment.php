<?php	
// ++++ Change: Added del_class_assignment.php 9/7 KM ++++
// Supports stud_mgmt_pg 
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');

// ++++ Change: Added Check for sending page 10/5/17 KM ++++
if(!empty($_GET['p'])){
$returnME= $_GET['p']; // Student
}

// ++++ Change: If statements to distinguish between faculty and student un-assign.php 9/29 KM ++++
if(!empty($_GET['stid'])){
$Subj= $_GET['stid']; // Student
}
if(!empty($_GET['fid'])){
$Subj= $_GET['fid']; // facultyHeader
}
$LoginID = $_SESSION['LoginID']; // Current User
$ClassID = $_GET['cid']; 

$DeleteClassA = new Class_Assign(array( 
	'Subj' => $Subj, 
	'LoginID' => $LoginID, 
	'ClassID' => $ClassID));	
$DeleteClassA->delClassA();

if($returnME){
	// ++++ Change: If statements to distinguish between faculty and student to reload appropriate page.php 9/29 KM ++++
	if(!empty($_GET['stid'])){echo "<script>window.open('../../../_facultyPages/".$returnME.".php?stid=$Subj', '_self') </script>";}	
	if(!empty($_GET['fid'])){echo "<script>window.open('../../../_facultyPages/".$returnME.".php','_self') </script>";}
}
else{
	echo '<div>No sending page info.</div>';
	if(!empty($_GET['fid'])){echo "<script>window.open('../../../_facultyPages/classes.php','_self') </script>";}
	
}
?>