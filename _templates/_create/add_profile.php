<?php 
if(isset($_SESSION['LoginID'])){$LoginID = $_SESSION['LoginID'];}
else{$LoginID = 0;}
if($LoginID != 0){ // Faculty (Role Check in DO)
?>
	<!-- ++++ Change: Created Reusable Module to add profiles 9/30 KM ++++ -->
	<form name ="create-profile" method = "POST">	
	<?php 	
		if($P=='add_student'){
		$Role = 'Student';
		$Password = 'GetRandom';
		$Subj = 0;
		}?>
		<table>
			<tr>
				<th><label>Name: </label></th>
				<td>
					<input type="text" name="FName" id="FName"> 
					<input type="text" name="LName" id="LName">
				</td>
			</tr>
			<tr>
				<th><label for="Email">Email: </label></th>
				<td>
					<input type="text" name="Email" id="Email">
				</td>
			</tr>
			<?php 
				if($Password != 'GetRandom'){
				?>	
					<tr>
						<th><label for="Password"> Password: </label></th>
						<td>
							<input type="text" name="Password" id="Password">
						</td>
					</tr>
		<?php }?>
				
			<tr>
			<th><label for="Role">Role: </label></th>
				<td>
					<input type="text" name="Role" id="Role" <?php if(!empty($Role)){echo 'value = "'.$Role.'"';} ?>>
				</td>
			</tr>

		</table>
		<br/>
		<input type="submit" value="Add Profile" name="AddProfile" id="AddProfile">
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
		'LoginID' => $LoginID,	
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
			echo '<div class="receipt"><br/>New ID: <strong>'. $newID .'</strong></div>';
			$i++;
		}
	}	
	
}//End If LoginID 

else{
	echo "Building New Profile coming soon...";
}
	?>
