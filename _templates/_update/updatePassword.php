<form action="#" method="post" class="form-horizontal" name="Password">
	<fieldset>
		<!-- Current password -->
		<div class="form-group">
		<legend>Change Password</legend>
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
			<!-- New Password -->
		<div class="form-group">
			<label class="control-label col-sm-4" for="NewPassword2">Retype New password:</label>
			<div class="col-sm-7">
				<input type="password" name="NewPassword2" class="form-control inputColor">
			</div>
		</div>
		<!-- Submit form  -->
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-9">
				<input type="submit" value="Change Password" name = "ChangePassword" id ="ChangePassword" class="btn btn-primary btn-lg submit">
			</div>
		</div>
	</fieldset>
</form>
<?php
$newPass= new Profile_DO();
if(isset($_POST['ChangePassword'])){
	if(isset($_POST['OldPassword']) && isset($_POST['NewPassword']) && isset($_POST['NewPassword2'])){
		$Old = $_POST['OldPassword'];
		$New= $_POST['NewPassword'];
		$New2 = $_POST['NewPassword2'];
		$LoginID = $_SESSION['LoginID']; //User
		if($New==$New2){
			$newPass->updatePassword($LoginID, $Old, $New);
		}
		else {echo '<div class = "error"> New Password Does Not Match. </div>';}
	}

}
?>