<?php 
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/profile_model.php');
?>
<?php
// Check for passed stid or fid
if(!empty($_GET['stid'])){
	$Subj = $_GET['stid'];
}
if(!empty($_GET['fid'])){ 
	$Subj = $_GET['fid'];
}
?>
<?php
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
				<th><label>Name: </label></th>
				<td><input type="text" name="FName" id="FName" value= <?php echo "'". $FName ."'";?>> 
				<input type="text" name="LName" id="LName" value= <?php echo "'". $LName ."'";?>></td>
			</tr>
			<tr>
				<th><label> Student ID: </label></th><td><label><?php echo $Subj; ?></label></td>
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
			'Subj' => $Subj,
			'Email' => $_POST['Email'],
			'FName' => $_POST['FName'],
			'LName' => $_POST['LName']
			));	
			
			$uProfile->updateProfile();
			// Reload page with updated info.
			if($uProfile){
				if(!empty($_GET['stid'])){ echo "<script>window.open('update_student.php?stid=$Subj', '_self')</script>"; }
				if(!empty($_GET['fid'])){ echo "<script>window.open('update_student.php?fid=$Subj', '_self')</script>"; }
			}
		}		
	}
	?>
</div>