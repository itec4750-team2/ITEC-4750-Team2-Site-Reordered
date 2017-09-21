<?php
include('_templates/mainHeader.php');?>
<?php
include('_php/password_reset_functions.php');
?>

		<div class="row">
			<div class="col-md-5">
				<form action='#'  method='post' name ='reqPassForm' class="form-horizontal">
					<fieldset><legend><b>Request New Password</b></legend>
					<!-- Email Field-->
					<div class="form-group">
						<label class="control-label col-sm-3" for="Email">Email:</label>
						<div class="col-sm-8">
						<input type="email" name="Email" class="form-control" id="userName" placeholder="Enter Email" required>
						</div>
					</div>
					<!-- Submit form  -->
					<div class="form-group" style="padding-bottom:7px;">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="submit" value="Request Reset" name='reqPass' class="btn btn-primary btn-lg submit">
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

