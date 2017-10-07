<?php 

?>

<div>
	<!-- ++++ Change: Added instructor assignment add dropbox from class_assign_do 9/8 KM ++++ -->
	<label for="FID">Add: </label>	
	<?php
		// -- calls dropdown box  --  drop_do.php
		// -- all instructor list
		$facdo = new Drop_DO($_SESSION['LoginID']);
		$rows=$facdo->facSelect();
		echo '<select name="FID" required>'; // Open
		echo '<option value="none"	 selected>Add Instructor</option>'; // Auto Select Current Instructor
			foreach ($rows as $fdo) {
			  echo '<option value="'.$fdo['LoginID'].'">'.$fdo['LoginID'].' '.$fdo['FName'].' '.$fdo['LName'].'</option>';
			}
		echo '</select>';// Close
	?>
	<input type="submit" value="Add" name="AddInst" id="AddInst">
</div>
<?php
if(isset($_POST['AddInst']) && $_POST['FID']!='none'){	
	$assInst = new Class_Assign(array(
		'LoginID' => $_SESSION['LoginID'], // User
		'Subj' => $_POST['FID'], // Class Assign Subject - New Instructor
		'ClassID' => $ClassID));
	$assInst->assignClass();
	
	if($assInst){
		echo "<script>window.open('update_class.php?cid=$ClassID','_self') </script>"; // reloads page to show updated information
	}			
}
else if(isset($_POST['AddInst']) && $_POST['FID']=='none'){
	$errorMsg = '<br/><div class="error">Please select instructor to Add.</div>'; 
	echo $errorMsg;
}
?>