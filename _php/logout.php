<?php

session_start();
//remove variables
	$LoginID = "";
	$FName = "";
	$LName = "";
	$Email = "";
	$Pword = "";
	$Role = "";
	$Locked = "";
	$ErrorBlock = "";
	$Token = "";
	
	// remove all session variables
//session_unset(); 
	unset($_SESSION['LoginID']);
	unset($_SESSION['FName']);
	unset($_SESSION['LName']);
	unset($_SESSION['Email']);
	unset($_SESSION['Pword']);
	unset($_SESSION['Role']);
	unset($_SESSION['Token']);
	unset($_SESSION['Locked']);
	unset($_SESSION['ErrorBlock']);

// destroy the session 
 session_destroy();

header('Location: ../login.php');
exit; 
?>