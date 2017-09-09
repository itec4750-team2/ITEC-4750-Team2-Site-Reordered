<?php
	class Stud_DO{
	// -- Create
		
	// -- Read 	

		// -- Student Info Page -- Update and Delete Accessible
		public function listStud($StID){
			if(!empty($StID)){
				include("../_php/config.php");
				$sql = "SELECT login.LoginID, login.LName, login.FName, login.Email
					FROM login
					WHERE login.LoginID = '$StID' && Role='Student'";	
				$getStud = mysqli_query($con, $sql);		
				//output data of each row
				$all_rows = array();
				while($row = mysqli_fetch_array($getStud)){
					$all_rows[]=$row;
				}
				return $all_rows;
			}
		}
	// -- Update Student Info				
			
	// -- Delete Student
	}
?>