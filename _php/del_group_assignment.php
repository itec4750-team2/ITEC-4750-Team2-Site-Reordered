<?php	
// ++++ Change: Added del_group_assignment.php 9/7 KM ++++
// Supports stud_mgmt_pg
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
require("../_php/_objects/group_assign_do.php");
require("../_php/_models/group_assign_model.php");

$StID = $_GET['stid']; // Student
$LoginID = $_SESSION['LoginID']; // Current User
$GroupID = $_GET['gid'];

$DeleteGroupA = new Group_Assign(array(
	'StID' => $StID, 
	'LoginID' => $LoginID, 
	'GroupID' => $GroupID));	
$DeleteGroupA->delGroupA();

//Directs back to stud_mgmt_pg with StID
echo "<script>window.open('../_facultyPages/stud_mgmt_pg.php?stid=$StID', '_self') </script>";	

?>