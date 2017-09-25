<?php
// ++++ Change: Refactoring Login Functions: Added to handle Login Functions. (Replaced login_functions.php)++++
class Login_DO{
	public function getUser($email){ // Check User (email) Exists
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		if(!empty($email)){
			$sql = "SELECT LoginID FROM login where Email = '$email'"; 
			$getByEmail = mysqli_query($con, $sql); // find user by email
			if(mysqli_num_rows($getByEmail) > 0){
				$user = mysqli_fetch_array($getByEmail);
				return $user;
			}
			else{
				echo '<div class="error">Check Username & Password </div>';
			}	
		}	
	}
	public function signIn($Subj, $password){ 	
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		//include($_SERVER['DOCUMENT_ROOT'].'/_php/session.php');
		$_SESSION = array();		
		if(!empty($Subj)){ // User LoginID
			$PwordCode = sha1($password);		
			$loginStr= "SELECT Role, LoginID, FName, LName, Email
			FROM login WHERE LoginID = '$Subj' AND Pword = '$PwordCode'";
			$login = mysqli_query($con, $loginStr);		
			// successful login (email && password match)			
			if(mysqli_num_rows($login) > 0){ 			
				$array1 = mysqli_fetch_array($login);	
				if($array1){ 
					$_SESSION['LoginID'] = $array1['LoginID']; // add LoginID to the session.
					$_SESSION['Role'] = $array1['Role']; // add Role to the session.
					$_SESSION['FName'] = $array1['FName']; // add FName to the session.
					$_SESSION['LName'] = $array1['LName']; // add LName to the session.
					$_SESSION['Email'] = $array1['Email']; // add Email to the session.
					$reset_lockedStr = "UPDATE login SET Locked = 0 WHERE Email = '$email'";	
					$reset_locked = mysqli_query($con, $reset_lockedStr);// reset locked counter on sucessful login
					session_write_close();					
					// Directs user to a dashboard based on role 
						// not sure if these 2 header calls will affect $_POST array or not - mm	
						// it shouldn't cause problems mike - 9/9 KM
					if( $_SESSION['Role'] == 'Faculty'){
						header('Location: _facultyPages/facultyDashboard.php');
					}		
					else {
						header('Location: _studentPages/studentDashboard.php');
					}
				}
			}
			//login credentials failed (email || password is incorrect)
			else{						
				$loginFailedStr= "SELECT Role, LoginID, Locked FROM login WHERE LoginID = '$Subj'"; //get user by email
				$loginFailed = mysqli_query($con, $loginFailedStr);
				$array2 = mysqli_fetch_array($loginFailed);	
				$locked = (int)$array2['Locked'];
				$ulogin = (int)$array2['LoginID'];
				//update lock counter
				$locked = $locked + 1;
				$update_lockedStr = "UPDATE login SET Locked = $locked WHERE LoginID = $ulogin";	
				$update_locked = mysqli_query($con, $update_lockedStr);				
				//LOCKOUT AFTER 5 TRIES 
				if((int)$locked >= 5){
					//creates semi-random lockedout password
					$number = rand(15, 1000);
					$lockedout = SHA1('mgalockedyououtsohard'. $number);
					//sets password to semi-random lockedout password			
					$update_passwordStr = "UPDATE login SET Pword = '$lockedout' WHERE LoginID = $ulogin";
					$update_password = mysqli_query($con, $update_passwordStr);
					//message for form
					echo '<div class = "error">Your account has been locked after 5 attempts.<br>';
					echo 'To reset password please click forgot password. </div>'; 									
				}
				//LOGIN FAILED (retry)
				else{	
					//message for form
					echo '<div class = "error"> Your username or password was incorrect. <br/>';
					echo 'This is your #: '. $locked . ' Login Attempt. <br/>';
					echo 'This account will be locked after 5 failed attempts.</div>';
				}					
			}				
		}
	} // end signIn function
} // end class
?>