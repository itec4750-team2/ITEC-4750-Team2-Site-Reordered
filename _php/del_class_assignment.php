<?php	
// ++++ Change: Added del_class_assignment.php 9/7 KM ++++
// Supports stud_mgmt_pg 
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
require("../_php/_objects/class_assign_do.php");
require("../_php/_models/class_assign_model.php");
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

// ++++ Change: If statements to distinguish between faculty and student to reload appropriate page.php 9/29 KM ++++
if(!empty($_GET['stid'])){echo "<script>window.open('../_facultyPages/stud_mgmt_pg.php?stid=$StID', '_self') </script>";}	
if(!empty($_GET['fid'])){echo "<script>window.open('../_facultyPages/classes.php','_self') </script>";}


?>