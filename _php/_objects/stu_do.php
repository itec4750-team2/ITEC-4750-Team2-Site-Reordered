<?php
	class Stud_DO{
	
	// -- Read 	

		// ++++ Change: Order by last name 10/10 KM ++++
		// -- Student Info Page -- Update and Delete Accessible
		public function listStud($StID){
			if(!empty($StID)){
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				$sql = "SELECT login.LoginID, login.LName, login.FName, login.Email
					FROM login
					WHERE login.LoginID = '$StID' && Role='Student'
					ORDER BY login.LName";	
				$getStud = mysqli_query($con, $sql);		
				//output data of each row
				$all_rows = array();
				while($row = mysqli_fetch_array($getStud)){
					$all_rows[]=$row;
				}
				return $all_rows;
			}
			mysqli_close($con);	// ++++ Change: Close DB connection 11/14 KM ++++
		}
		// ++++ Change: List all students 9/24 KM ++++
		// ++++ Change: Order by last name 10/10 KM ++++
		// -- All Student Page --
		public function listAll($FID){
			if(!empty($FID)){
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				//  -- Check that user is faculty
				$checkrole = "SELECT Role From login WHERE LoginID = '$FID'";			
				$getRole = mysqli_query($con, $checkrole);
				if (mysqli_num_rows($getRole) > 0) {
					while($row = mysqli_fetch_array($getRole)){
						$myRole = $row['Role'];
						if ($myRole == 'Faculty'){
							$sql = "SELECT login.LoginID, login.LName, login.FName, login.Email
								FROM login
								WHERE Role='Student'
								ORDER BY login.LName";	
							$getStud = mysqli_query($con, $sql);		
							//output data of each row
							$all_rows = array();
							while($row = mysqli_fetch_array($getStud)){
								$all_rows[]=$row;
							}
							return $all_rows;
						}
					}
				}
			}
			mysqli_close($con);	// ++++ Change: Close DB connection 11/14 KM ++++
		}
		// ++++ Change: List all students in instructor's class 9/24 KM ++++
		// ++++ Change: Order by last name 10/10 KM ++++
		// -- My Student Page --
		public function listmyStuds($FID){
			if(!empty($FID)){
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				//  -- Check that user is faculty
				$checkrole = "SELECT Role From login WHERE LoginID = '$FID'";			
				$getRole = mysqli_query($con, $checkrole);
				if (mysqli_num_rows($getRole) > 0) {
					while($row = mysqli_fetch_array($getRole)){
						$myRole = $row['Role'];
						if ($myRole == 'Faculty'){
							$sql = "SELECT a.LName, c.LoginID, c.LName, c.FName, c.Email, b.ClassID
								FROM (((login a
								INNER JOIN class_assign b ON a.LoginID = b.LoginID)
								INNER JOIN class_assign d ON b.ClassID = d.ClassID)
								INNER JOIN login c ON c.LoginID = d.LoginID)
								WHERE  c.Role='Student' && a.LoginID = '$FID'
								ORDER BY c.LName ASC";
							$getStud = mysqli_query($con, $sql);		
							//output data of each row
							$all_rows = array();
							while($row = mysqli_fetch_array($getStud)){
								$all_rows[]=$row;
							}
							return $all_rows;
						}
					}
				}
			}	
			mysqli_close($con);// ++++ Change: Close DB connection 11/14 KM ++++
		}
	}
?>