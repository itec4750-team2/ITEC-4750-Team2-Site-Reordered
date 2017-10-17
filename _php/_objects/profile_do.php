<?php
// ++++ Change: References from Student to Profile (to include faculty profile settings) 10/7 KM ++++
	class Profile_DO{
// -- Create
		// ++++ Change: Created newProfiles 10/14 KM ++++
		public function newProfiles($Role, $LoginID){	
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			// -- Check that user is faculty
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole); 
			if(mysqli_num_rows($getRole) > 0){
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty'){
						// -- Get File Contents
						$dom = new DomDocument(); 
						if ( $_FILES['file']['tmp_name'] ){
							$dom->load( $_FILES['file']['tmp_name'] );
							$rows = $dom->getElementsByTagName( 'Row' );
							$first_row = true;
							foreach ($rows as $row){		
								if ( !$first_row ){
									$FName = "";
									$LName = "";
									$Email = "";
									$Password = "";		 
									$index = 1;
									$cells = $row->getElementsByTagName( 'Cell' );
									foreach( $cells as $cell ){ 
										$ind = $cell->getAttribute( 'Index' );
										if ( $ind != null ) {$index = $ind;}	
										if ( $index == 1 ) {$FName = $cell->nodeValue;}
										if ( $index == 2 ) {$LName = $cell->nodeValue;}
										if ( $index == 3 ) {$Email = $cell->nodeValue;}
										$index ++;
									}
									$number = rand(15, 999);
									$Password = $LName.$number; 
									$Pword=SHA1($Password);					
									
									// -- Insert if email not found
									$sql = "INSERT IGNORE INTO login										
											(`Email`, `Pword`, `Role`, `FName`, `LName`) 
											VALUES ( '$Email', '$Pword', '$Role', '$FName', '$LName')";
									$result = mysqli_query($con, $sql);	
									
									// -- Display New Students with Temporary password
									$new = "SELECT LoginID 
									FROM login 
									WHERE Email='$Email' && Pword='$Pword' limit 1";
									$newProf = mysqli_query($con, $new);
									$all_rows = array();
									
									while($row = mysqli_fetch_array($newProf)){
										$all_rows[]=$row;	
										foreach($all_rows as $value){
											echo '<tr>';		
											echo '<td>'.$value['LoginID'].'</td>';							
											echo '<td>'.$FName.'</td>';
											echo '<td>'.$LName.'</td>';
											echo '<td>'.$Email.'</td>';	
											echo '<td>'.$Role.'</td>';
											echo '<td>'.$Password.'</td>';	
											echo '</tr>';
										}// foreach all_rows									
									}// While Row										
							}// if !first row
							$first_row = false;	
							}// foreach row
							echo '<tr>';
							if(empty($all_rows)){echo '<td colspan="6"><span class="error">No New Students.</span></td>';}
							echo '</tr>';
					}//file	
					else{ 
						echo '<div class = "error"> Please Login. </div>'; 
					}		
			}}}// Role Check Faculty
			mysqli_close($con);	
		}			
	// -- Create
		// ++++ Change: Created addProfile 10/10 KM ++++
		public function addProfile($values){
			if(isset($values)){
			//Anyone should be able to create a profile. Different pages should auto pass different values.	
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			$number = rand(15, 30);
			$Email = $values['Email'];
			if($values['Password'] == 'GetRandom'){
				$Password = $values['LName'].$number; 
				$PWord=SHA1($Password);
			}			
			else{$PWord = SHA1($Password);}
			// --Update Login				
			$sql = "INSERT INTO login
				(`Email`, `Pword`, `Role`, `FName`, `LName`) 
				VALUES (?, ?, ?, ?, ?);";
				$stmt = $con->prepare($sql);
				$stmt->bind_param('sssss', $values['Email'], $PWord, $values['Role'], $values['FName'], $values['LName']);
				$stmt->execute();
				$stmt->close();
			echo '<div class="receipt">';
			echo 'You created <strong>'.$values['FName'].' '.$values['LName']."</strong>'s profile.</br>";
			echo 'Profile Temporary Password is: <strong> '.$Password.'</strong><br/>'; 
			// Set up to Send password reset email?
			echo 'Password can be reset on login page.<br/>';
			echo '</div>';
		
			$new = "SELECT LoginID FROM login WHERE Email='$Email' && Pword='$PWord' limit 1";
			$newProf = mysqli_query($con, $new);
			$all_rows = array();
				while($row = mysqli_fetch_array($newProf)){
					$all_rows[]=$row;
				}
				return $all_rows;
			}
				mysqli_close($con);
		}

	// -- Read 	

		// -- list profile data
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
			mysqli_close($con);
		}
	// ++++ Change: Update Password Added 10/16 KM ++++
	//Update Password		
	public function updatePassword($LoginID, $Old, $New){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$OldPWord = SHA1($Old);
		$NewPWord = SHA1($New);
		// -- Check that user is faculty
		$getLogin = "SELECT LoginID, FName, LName, Pword From login WHERE LoginID = '$LoginID' && Pword = '$OldPWord'";			
		$getProfile = mysqli_query($con, $getLogin);
		if (mysqli_num_rows($getProfile) > 0) {
			while($row = mysqli_fetch_array($getProfile)){
				// --Update Password		
				$sql = "UPDATE login SET Pword =? WHERE LoginID=?";
				$stmt = $con->prepare($sql);
				$stmt->bind_param('si', $NewPWord, $LoginID);
				$stmt->execute();
				$stmt->close();
				echo '<div class = "success"> You updated '.$row['FName'].' '.$row['LName']."'s password. </div>";					
			}
		}	
		else{ echo '<div class = "error"> Old Password incorrectly typed. </div>';}
	}			
// -- Update Profile Info		
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
						echo '<div class = "success"> You updated '.$values['FName'].' '.$values['LName']."'s profile. </div>";
					}
					else{ 
						echo '<div class = "error"> There was an error. </div>'; 
					}
				}
			}
		}
		else{ 
			echo '<div class ="error">Please Login.</div>'; 
		}
		mysqli_close($con);
	}	
			
// -- Delete
	public function deleteProfile($values){
			if(!empty($values)){
				$LoginID = $values['LoginID'];
				$Subj = $values['Subj'];				
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				// -- Check that user is faculty
				$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
				$getRole = mysqli_query($con, $checkrole); 
				//User is faculty or deleting their own profile.
				// ++++ Change: Allow logged in user to delete. 10/7 KM ++++
				if((mysqli_num_rows($getRole)) > 0 || ($LoginID == Subj)){
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
							echo '<div class = "error"> There was an error. </div>';	
						}
					}
				}
			}
			else{ 
				echo '<div class = "error"> Only faculty can delete students. <br/> Please Login. </div>'; 
			}
			mysqli_close($con);
	}
}
?>