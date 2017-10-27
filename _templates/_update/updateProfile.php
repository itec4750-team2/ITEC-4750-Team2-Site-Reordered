<?php
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/profile_model.php');
?>
<?php
// ++++ Change: Added Check for IDs module 10/8KM ++++
// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
?>
<?php
if(isset($P)){
	if($P=='studentSettings'){
		$Subj = $LoginID;
	}
}
if(!empty($_SESSION['LoginID'])){
	if(!isset($Subj) || empty($Subj)){echo '<div class="error">Uhoh problem getting Profile ID</div>';}
	if(!empty($Subj)){
		//calls class data object and loads table data by ClassID
		$profile = new Profile_DO();
		$rows=$profile->listProfile($Subj);
			foreach ($rows as $value){
				$FName = $value['FName'];
				$LName = $value['LName'];
				$Email = $value['Email'];
				?>
				<form action="#" method = "POST" class="form-horizontal" name ="update-profile" >
					<fieldset><legend>Update Settings for:
					<?php
						if($P!='studentSettings'){echo '<a href="stud_mgmt_pg.php?stid=' . $Subj . '">'.$Subj.' '.$FName.' '.$LName.'</a>';}
						if($P=='studentSettings'){echo '<a href="studentDashboard.php">'.$FName.' '.$LName.'</a>';}
					?></legend>
							<div class="form-group">
								<label class="control-label col-sm-4" for="FName">First Name: </label>
								<div class="col-sm-7">
									<input type="text" name="FName" id="FName" value= <?php echo "'". $FName ."'";?> class="form-control inputColor">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" for="LName">Last Name: </label>
								<div class="col-sm-7">
									<input type="text" name="LName" id="LName" value= <?php echo "'". $LName ."'";?> class="form-control inputColor">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4" for="Email">Email: </label>
								<div class="col-sm-7">
									<input type="text" name="Email" id="Email" value= <?php echo "'". $Email ."'";?> class="form-control inputColor">
								</div>
							</div>
						<br/>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-9">
								<input type="submit" value="Update Profile" name="UpdateProfile" id="UpdateProfile" class="btn btn-primary btn-lg submit">
							</div>
						</div>
						<?php
							if(($_SESSION['Role'] == 'Faculty')){
						?>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-9">
								<input type="submit" value="Delete Profile" name="DeleteProfile" id="DeleteProfile"class="btn btn-primary btn-lg submit">
							</div>
						</div>
						<?php
							}
						?>
					</fieldset>
				</form>
			<?php
				if(isset($_POST['UpdateProfile'])){
					$uProfile = new Profile(array(
					'Password' => 'UNK',
					'LoginID' => $_SESSION['LoginID'],
					'Role' => $Role,
					'Subj' => $Subj,
					'Email' => $_POST['Email'],
					'FName' => $_POST['FName'],
					'LName' => $_POST['LName']
					));

					$uProfile->updateProfile();
					// Reload page with updated info.
					if($uProfile){
					// ++++ Change: Added Check for sending page module 10/8KM ++++
					// Gets sending page and redirects
					if($P=='studentSettings'){include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getP-Stud.php');}
					if($P!='studentSettings'){include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getP-Fac.php');}
					}
				}
			}
		}//End If !empty  Subj
	}//End If !empty LoginID
	?>