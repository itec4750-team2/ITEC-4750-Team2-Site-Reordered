<?php
include('_php/login_functions.php');
include('_templates/mainHeader.php');
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
							<a href="forgotpassword.php?password=forgotten">Forgot Password<a>
						</div>
					</div>
					<!-- Submit form  -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="submit" value="Login" name="Login" class="btn btn-primary btn-lg submit">
						</div>
					</div>
					<!-- Error Msg -->
					<div class "errors">
					<?php
					include('_templates/errorBlock.php');
					?>
					</div>
					</fieldset>
				</form>
			</div>
		</div>
	<!-- End container div that started in mainHeader.php -->
	</div>
		<div class = 'clear'><?php include('_templates/mainNav.php');?></div>
	<!-- End main that started in mainHeader.php -->
	</main>
<?php include('_templates/footer.php');?>
