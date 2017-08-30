<?php
include('_php/login_functions.php');
include('_templates/mainHeader.php');
?>
	<!-- Main Content Section-->
	<main>
		<form action="#" method="post" id="loginForm">
			<fieldset><legend>Login</legend>
			<!-- Email Field-->
				<div class="two"><label for="Email">Email</label><input type="email" name="Email" 
					id="userName" placeholder="Enter Email" required></div>
			<!-- Password -->
				<div class="two"><label for="Pword">Password</label><input type="password" name="Pword" 
					id="password" required></div>
			<!-- Submit form  -->
				<div class="one"><input type="submit" value="Login" name="Login" id="submit"></div>
				<div class="two"><a href="forgotpassword.php?password=forgotten">Forgot Password?</a></div>
				
			<!-- Error Msg -->
			<div class "errors">
			<?php
			include('_templates/errorBlock.php');
			?>
			</fieldset>
		</form>
	
		<div class = 'clear'><?php include('_templates/mainNav.php');?></div>
	</main>
<?php include('_templates/footer.php');?>	
