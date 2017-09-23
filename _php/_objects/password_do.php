<?php
// ++++ Change: Added to handle Password Functions. (Replaced password_reset_functions.php)++++
class Password_DO{
//update
	public function requestPass($email){ 	
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		include($_SERVER['DOCUMENT_ROOT'].'/_php/pr_email.php');
		//check that user exists		
		$getByEmailStr = "SELECT * FROM login where Email = '$email'";
		$getByEmail = mysqli_query($con, $getByEmailStr);
		if($getByEmail){
			//generate token for email reset	
			if (mysqli_num_rows($getByEmail) > 0){
				$str = "0123456789qwerty";
				$str = str_shuffle($str);
				$str = substr($str, 0, 10);
 				//set token 
				$updateTokenStr = "UPDATE login SET token='$str' WHERE email='$email'";
				$updateToken = mysqli_query($con, $updateTokenStr);
			//generate link
				$resetPath = "/reset_password.php/?token=$str&email=$email";	//path to reset current user password
				//full link to email user
				$emailLink = $server . $resetPath;	
				$emailLink = htmlspecialchars( $emailLink, ENT_QUOTES, 'UTF-8' );
			//send email with token in url link
			//calls pr_email.php 
				emailToken($emailLink, $email);
			}	
		}
	//close dB connection
	mysqli_close($con);
	}
	
//update	
	function newPasswordAssign($email, $token, $new_password){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		if (isset($email) && isset($token) && isset($new_password)){		
			$sql = "SELECT login.Email 
			FROM login WHERE Email='$email' AND Token='$token'";
			$getLogin = mysqli_query($con, $sql);
				if (mysqli_num_rows($getLogin) > 0){
					$locked = 0; // reset locked
					$token = '';
					$new_password = sha1($new_password);	
					$new_passwordStr = "UPDATE login SET Pword = ?, Locked = ?, Token = ?
					WHERE Email = '$email'";
							$stmt = $con->prepare($new_passwordStr);
							$stmt->bind_param("sis",  $new_password, $locked, $token);
							$stmt->execute();
							$stmt->close();	
							echo '<div class="sucess">';	
							echo '<a href="'.$server.'/login.php?">Please Login</a></div>';

				} 
				else{
					$errorMsg = 'There was a problem with the password reset.<br/>';
					$errorMsg .= '<a href="'.$server.'/forgot_password.php?">';
					$errorMsg .= 'Please Try Again</a>';
					echo '<div class = "error">'.$errorMsg.'</div>';
				}
		}
	//close dB connection
	mysqli_close($con);
	}
}
?>