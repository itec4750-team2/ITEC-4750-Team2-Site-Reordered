<?php
//Start your session

	//create session	
	
	session_start();

	//login session variables
	$LoginID = "";
	$FName = "";
	$LName = "";
	$Email = "";
	$Pword = "";
	$Role = "";
	$Locked = "";
	$ErrorBlock = "";
	$Token = ""; 
	$FacClasses = "";
	$StuClasses = "";
	
   //Read your session (if it is set)
   	if(isset($_SESSION['LoginID'])) $LoginID = $_SESSION['LoginID'];
	if(isset($_SESSION['FName'])) $FName = $_SESSION['FName'];
	if(isset($_SESSION['LName'])) $LName = $_SESSION["LName"];
	if(isset($_SESSION['Email'])) $Email = $_SESSION["Email"];
	if(isset($_SESSION['Pword'])) $Pword = $_SESSION["Pword"];
	if(isset($_SESSION['Role'])) $Role = $_SESSION["Role"];
	if(isset($_SESSION['Token'])) $Token = $_SESSION["Token"];
	if(isset($_SESSION['Locked'])) $Locked = $_SESSION["Locked"];
	if(isset($_SESSION['ErrorBlock'])) $ErrorBlock = $_SESSION["ErrorBlock"];
	
	//working on output for classes
	if(isset($_SESSION['FacClasses'])) $FacClasses = $_SESSION["FacClasses"];
	if(isset($_SESSION['StuClasses'])) $StuClasses = $_SESSION["StuClasses"];
  
?>
