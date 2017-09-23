<?php
// ++++ Added to allow using this as a module in other pages. ++++
include($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/password_do.php');
?>
	<?php 
		if(!empty($_GET['token'])){
			$token = $_GET['token'];
		}		
		if(!empty($_GET['email'])){
			$email= $_GET['email'];
		}
	?>
	<form action="#" method="post" id="resetPassForm">			
		<h2 class="center">Welcome, You are changing the password for: <?php if(!empty($_GET['email'])){echo $_GET['email'];}?></h2>
		<fieldset><legend>Set New Password</legend>			
			<!-- Password1 -->
				<div class="two"><label for="Pword1">Enter New Password</label><input type="password" name="Pword1" 
					id="password" placeholder="Enter Password" required></div>	
			<!-- Password2 -->
				<div class="two"><label for="Pword2">Retype Password</label><input type="password" name="Pword2" 
					id="password" placeholder="Enter Password" required></div>		
			<!-- Submit form  -->
				<div class="one"><input type="submit" value="Reset" name="resetPass" id="resetPass"></div>					
		</fieldset>
	</form>
	
	<?php 
		$resetPass=new Password_DO();
		$errorMsg ='';
		if(isset($_POST['resetPass'])){
			if($_POST['Pword1'] == $_POST['Pword2']){
				$new_password = $_POST['Pword1'];	
			}
		}	
		if(isset($_POST['resetPass']) && (!empty($new_password)) && (!empty($email)) && (!empty($token))){
			$resetPass->newPasswordAssign($email, $token, $new_password);	
		}	
		else if(isset($_POST['resetPass']) && empty($new_password)){
			$errorMsg = 'Your email entries do not match.';
			echo '<div class = "error">'.$errorMsg.'</div>';
		}

