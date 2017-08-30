<?php
include('_templates/mainHeader.php');?>
<?php
include('_php/password_reset_functions.php');
?>
<!-- Main Content Section-->
	<main>

	<form action='#'  method='post' name ='reqPassForm'>	
		<fieldset><legend>Request New Password</legend>
			<div class="two"><input type="email" name="Email" id="userName" placeholder="Enter Email" required></div>
			<div class="two"><input type='submit' name='reqPass' value='Request Reset'></div>	
			<!-- Error Msg -->
			<div class "errors">
			<?php
			include('_templates/errorBlock.php');
			?>
			</div>
		</fieldset>	
	</form>
	<div class = 'clear'><?php include('_templates/mainNav.php');?></div>
	</main>
<?php include('_templates/footer.php');?>	

