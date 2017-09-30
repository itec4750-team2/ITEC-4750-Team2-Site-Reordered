<?php
	class Profile_DO{
	// -- Create
		
	// -- Read 	

		// -- update_student page
		public function listProfile($Subj){
			if(!empty($Subj)){
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				$sql = "SELECT login.LoginID, login.LName, login.FName, login.Email
					FROM login
					WHERE login.LoginID = '$Subj'";	
				$getProfile = mysqli_query($con, $sql);		
				//output data of each row
				$all_rows = array();
				while($row = mysqli_fetch_array($getProfile)){
					$all_rows[]=$row;
				}
				return $all_rows;
			}
		}
// -- Update Student Info		
	public function updateProfile($values){
		if(!empty($values)){
			$LoginID = $values['LoginID'];
			$Subj = $values['Subj'];
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			// -- Check that user is faculty
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole);
			if (mysqli_num_rows($getRole) > 0) {
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty' || ($Subj == $LoginID)){
						// --Update Login				
						$sql = "UPDATE login SET Email =?, FName=?, LName=?	WHERE LoginID=?";
							$stmt = $con->prepare($sql);
							$stmt->bind_param('sssi',  $values['Email'], $values['FName'], $values['LName'], $values['Subj']);
							$stmt->execute();
							$stmt->close();
						echo 'You updated '. $values['FName'] . ' ' . $values['LName']."'s profile.";
					}
					else{ 
						echo 'There was an error.'; 
					}
				}
			}
		}
		else{ 
			echo 'Please Login.'; 
		}
	}	
			
// -- Delete Student
	public function deleteStudent($values){
			if(!empty($values)){
				$LoginID = $values['LoginID'];
				$Subj = $values['Subj'];
				echo $LoginID . ' '. $Subj;
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				// -- Check that user is faculty
				$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
				$getRole = mysqli_query($con, $checkrole);
				if (mysqli_num_rows($getRole) > 0){
					while($row = mysqli_fetch_array($getRole)){
						$myRole = $row['Role'];
						if ($myRole == 'Faculty'){
							// -- Delete Class
							$sql = "DELETE FROM login WHERE LoginID = ?;";
								$stmt = $con->prepare($sql);
								$stmt->bind_param("i", $Subj);
								$stmt->execute();
						} 
						else{ 
							echo "There was an error.";	
						}
					}
				}
			}
			else{ 
				echo "Only faculty can delete students. <br/> Please Login."; 
			}
	}
}
?>