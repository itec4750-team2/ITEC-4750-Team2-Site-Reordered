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
				<br/>
				<br/>
				<div>		
				<form name ="update-profile" method = "POST" action="#">
					<fieldset><legend>Update Student Info</legend>
						<table>
							<tr>
								<th><label>First Name: </label></th>
								<td><input type="text" name="FName" id="FName" value= <?php echo "'". $FName ."'";?>></td> 
							</tr>
							<tr>	
								<th><label>Last Name: </label></th>
								<td><input type="text" name="LName" id="LName" value= <?php echo "'". $LName ."'";?>></td>
							</tr>
							<tr>
								<th><label> Student ID: </label></th><td><label><?php echo '<a href="stud_mgmt_pg.php?stid=' . $Subj . '">'.$Subj.'</a>'; ?></label></td>
							</tr>	
							<tr>
								<th><label for="Email">Email: </label></th>
								<td><input type="text" name="Email" id="Email" value= <?php echo "'". $Email ."'";?>></td>
							</tr>
						</table>
						<br/>
						<input type="submit" value="Update Profile" name="UpdateProfile" id="UpdateProfile">
						<?php 
							if($Subj!=$LoginID){
						?> 
							<input type="submit" value="Delete Profile" name="DeleteProfile" id="DeleteProfile">
						<?php
							}
						?>
					</fieldset>
				</form>
			<?php	
				if(isset($_POST['UpdateProfile'])){	
					$uProfile = new Profile(array(	
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
					include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getP-Fac.php');
					}
				}		
			}
		}//End If !empty  Subj
	}//End If !empty LoginID 
	?>
</div>