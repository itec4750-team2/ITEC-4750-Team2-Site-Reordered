<?php
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/mainHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/login_do.php');
?>
		<div class="row">
			<div class="col-md-5">
				<form action="#" method="post" id="loginForm" class="form-horizontal">
					<fieldset><legend><b>Login</b></legend>
					<!-- Email Field-->
					<div class="form-group">
						<label class="control-label col-sm-3" for="Email">Email:</label>
						<div class="col-sm-8">
						<input type="email" name="Email" class="form-control" id="userName" placeholder="Enter Email" required>
						</div>
					</div>
					<!-- Password -->
					<div class="form-group">
						<label class="control-label col-sm-3" for="Pword">Password:</label>
						<div class="col-sm-8">
						<input type="password" name="Pword" class="form-control" id="password" placeholder="Enter Password" required>
						</div>
					</div>
					<!-- Register and forgot password -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-9">
							<a href=##>Register</a> &#8226;
							<a href="forgot_password.php?password=forgotten">Forgot Password<a>
						</div>
					</div>
					<!-- Submit form  -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="submit" value="Login" name="Login" class="btn btn-primary btn-lg submit">
						</div>
					</div>
					<!-- ++++ Change: Removed errorBlock handled in Login_DO rather than SESSION ++++ -->
					</fieldset>
				</form>
				
					<!-- ++++ Change: Refactoring login functions ++++ -->
					<?php 
					// --- Calls Login_DO to handle login
					if(isset($_POST['Login']) && (!empty($_POST['Email'])) && (!empty($_POST['Pword']))){
						$email = $con->real_escape_string($_POST['Email']);
						$password = $con->real_escape_string( $_POST['Pword']);
						
						$userdo = new Login_DO();		
						$user=$userdo->getUser($email);  // check for user		
						$Subj = $user['LoginID']; 

						if(!empty($Subj)){
							$signin = new Login_DO();
							$accts=$signin->signIn($Subj, $password);
						}				
					}	
					// --- Msg for Empty Email or Password --->
					if(isset($POST['Login']) && ((empty($_POST['Email'])) || (empty($_POST['Pword'])))){
						echo '<div class="error">Please Enter Email & Password.</div>';
					}
					?>				
			</div>
		</div> <!-- End container div that started in mainHeader.php -->
	</div>
</main>	<!-- End main -->
<?php include('_templates/_footers/footer.php');?>
