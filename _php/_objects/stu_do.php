<?php

class Stud_DO{

// -- Create
	
// -- Read All

// -- Load By Class		

public function listClassStuds($ClassID){
		if(!empty($ClassID)){
		include("../_php/config.php");

		$sql = "SELECT login.LoginID, class.ClassID, login.LName, login.FName, login.Email
			FROM(((class
			INNER JOIN semester ON class.SemesterID=semester.SemesterID)
			INNER JOIN class_assign ON class.ClassID=class_assign.ClassID)
			INNER JOIN login ON class_assign.LoginID = login.LoginID)
			WHERE DATEDIFF(ExpDate, NOW())>0 && login.Role = 'Student' && class.ClassID='$ClassID'";
		
		$getStuds = mysqli_query($con, $sql);
		
		//output data of each row
		$all_rows = array();
		while($row = mysqli_fetch_array($getStuds)){$all_rows[]=$row;}
		return $all_rows;}}

// -- Student Info Page -- Update and Delete Accessible

// -- Update Student Info				
		
// -- Delete Student
}
?>