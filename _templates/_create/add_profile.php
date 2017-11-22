<?php
//Check logged in?
// ++++ Change: Added Check for IDs module 10/10 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');

//If logged in
if($LoginID != 0){ // Must be logged in. Role is checked in DO
?>
	<!-- ++++ Change: Created Reusable Module to add profiles 9/30 KM ++++ -->
	<form name ="create-profile" method = "POST" class="form-horizontal">
	<?php
		if($P=='add_student'){ // _facultyPages/add_student Settings
			$Role = 'Student';
			$Password = 'GetRandom';
			$Subj = 0; // Pass empty to model
		}
	?>
		<div class="form-group">
			<label class="control-label col-sm-4" for="FName">First Name:</label>
			<div class="col-sm-7">
			<input type="text" name="FName" id="FName" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="LName">Last Name:</label>
			<div class="col-sm-7">
			<input type="text" name="LName" id="LName" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" for="Email">Email:</label>
			<div class="col-sm-7">
			<input type="text" name="Email" id="Email" class="form-control" required>
			</div>
		</div>
		<?php
			if($Password != 'GetRandom'){
		?>
			<div class="form-group">
				<label class="control-label col-sm-4" for="Password">Password:</label>
				<div class="col-sm-7">
				<input type="text" name="Password" id="Password" class="form-control" required>
				</div>
			</div>
		<?php }?>
		<div class="form-group">
			<label class="control-label col-sm-4" for="Role">Role:</label>
			<div class="col-sm-7">
			<input type="text" name="Role" id="Role" <?php if(!empty($Role)){echo 'value = "'.$Role.'"';} ?> class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-9">
				<input type="submit" value="Add Profile" name="AddProfile" id="AddProfile" class="btn btn-primary btn-lg submit">
			</div>
		</div>
	</form>
 <?php
	//Add Profile
	//profile_do echos a profile message div class="receipt"
	$aProfile = new Profile_DO();
	if(isset($_POST['AddProfile'])){
		// ++++ Change: Added Variables for getting student_info for new profile 10/5 KM ++++
		$Email = $_POST['Email'];
		$FName = $_POST['FName'];
		$LName = $_POST['LName'];

		$aProfile = new Profile(array(
		'LoginID' => $_SESSION['LoginID'],
		'Role' => $Role,
		'Password'=> $Password,
		'Subj' => $Subj, //Passes 0 because not used but model requires
		'Email' => $Email,
		'FName' => $FName,
		'LName' => $LName
		));

		//Get LoginID of new profile as $newID
		$rows = $aProfile->addProfile();
		$i=0;
		foreach($rows as $value){
			if($i>=1){break;}//return only first value
			$newID=$value['LoginID'];
			echo '<div class="receipt"><br/>New ID: <strong><a href="stud_mgmt_pg.php?stid=' . $newID . '">';
			echo 	$newID . '</a></strong></div>';
			$i++;
		}
	}

}//End If LoginID

	?>
