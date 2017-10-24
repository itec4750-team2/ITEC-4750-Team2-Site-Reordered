<?php
include($_SERVER['DOCUMENT_ROOT'].'/_templates/studentHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/studentNav.php');
?>
<!--
--- -- --- WORK FLAG
--- This page still needs work. Currently stub for Changing Password
--- What settings should go here?
--- KM -- 8/27 AM
---
-->
<!-- I used the faculty settings as a starting point for student settings and updating the filename to match
--- the naming convention; however the above comment still applies.  This is still really just a stub
--- MM -- 10/04 

-->
<h2 class="center">Settings</h2>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
		<div class="row">
			<div class="col-md-6 col-centered">
				<form action="#" method="post" class="form-horizontal" name="Password">
					<fieldset>
						<!-- Current password -->
						<div class="form-group">
							<label class="control-label col-sm-4" for="OldPassword">Current password:</label>
							<div class="col-sm-7">
								<input type="password" name="OldPassword" class="form-control inputColor">
							</div>
						</div>
						<!-- New Password -->
						<div class="form-group">
							<label class="control-label col-sm-4" for="NewPassword">New password:</label>
							<div class="col-sm-7">
								<input type="password" name="NewPassword" class="form-control inputColor">
							</div>
						</div>
						<!-- Submit form  -->
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-9">
								<input type="button" onclick="ChangePassword()" value="Change Password" class="btn btn-primary btn-lg submit">
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

	<footer>

	</footer>

</body>
</html>
