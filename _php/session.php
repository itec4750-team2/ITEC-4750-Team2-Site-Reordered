<?php
// ++++ Change: Removed unneccessary session variables. 
//      Session only handles logged in user after refactoring. ++++

//Start your session

	//create user session		
	session_start();

	//login session variables
	$LoginID = "";
	$Role = "";
	$FName = "";
	$LName = "";
	$Email = "";

   //Read your session (if it is set)
   	if(isset($_SESSION['LoginID'])) $LoginID = $_SESSION['LoginID'];
	if(isset($_SESSION['Role'])) $Role = $_SESSION["Role"];
	if(isset($_SESSION['FName'])) $FName = $_SESSION['FName'];
	if(isset($_SESSION['LName'])) $LName = $_SESSION["LName"];
	if(isset($_SESSION['Email'])) $Email = $_SESSION["Email"];  
?>

