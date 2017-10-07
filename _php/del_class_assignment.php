<?php	
// ++++ Change: Added del_group_assignment.php 9/7 KM ++++
// Supports stud_mgmt_pg 
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
require("../_php/_objects/class_assign_do.php");
require("../_php/_models/class_assign_model.php");

$StID = $_GET['stid']; // Student
$LoginID = $_SESSION['LoginID']; // Current User
$ClassID = $_GET['cid'];

$DeleteClassA = new Class_Assign(array( 
	'Subj' => $StID, 
	'LoginID' => $LoginID, 
	'ClassID' => $ClassID));	
$DeleteClassA->delClassA();

echo "<script>window.open('../_facultyPages/stud_mgmt_pg.php?stid=$StID', '_self') </script>";	

?>