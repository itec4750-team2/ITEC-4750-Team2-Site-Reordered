<?php
// ++++ Added to allow using this as a module in other pages. ie. student_mgt_page ++++
include($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/login_do.php');
include($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/password_do.php');
?>
		<form action='#'  method='post' name ='reqPassForm'>	
			<fieldset><legend>Request New Password</legend>
				<div class="two"><input type="email" name="Email" id="Email" placeholder= "Enter Email." <?php if(!empty($_GET['stid'])){echo 'value="'.$Email .'"';} ?> required></div>
				<div class="two"><input type='submit' name='reqPass' value='Request Reset'></div>	
			</fieldset>	
		</form>
		<?php 
			
			$errorMsg ='';
			if(isset($_POST['reqPass']) && !$_POST['Email']){
				$errorMsg = 'Please enter your email.';
				echo '<div class = "error">'.$errorMsg.'</div>';
			}	
			else if(isset($_POST['reqPass']) && $_POST['Email']){
				$email=$_POST['Email'];
				$userdo = new Login_DO();		
				$user=$userdo->getUser($email); // Check for user	
				$Subj = $user['LoginID']; 

				if(!empty($Subj)){ // If there is a LoginID for user
					$getPass=new Password_DO();
					$getPass->requestPass($email);	
					if($getPass){
							if(!empty($StID)){ echo '<div class="Success"> Success! Advise student to check email.</div>'; }
							else { echo '<div class="Success"> Success!  Please check your email for the reset link.</div>'; }
					}
				}
			}

