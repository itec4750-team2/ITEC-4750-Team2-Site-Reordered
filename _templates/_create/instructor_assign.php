<?php

?>

<div class="form-group">
	<!-- ++++ Change: Added instructor assignment add dropbox from class_assign_do 9/8 KM ++++ -->
	<label class="control-label col-sm-4" for="FID">Add: </label>
	<div class="col-sm-6">
		<?php
			// -- calls dropdown box  --  drop_do.php
			// -- all instructor list
			// ++++ Change: Removed LoginID from dropdown (UTA indicated confusion) 11/16 KM ++++
			$facdo = new Drop_DO($_SESSION['LoginID']);
			$rows=$facdo->facSelect();
			echo '<select name="FID" class="form-control inputColor" required>'; // Open
			echo '<option value="none"	 selected>Add Instructor</option>'; // Auto Select Current Instructor
				foreach ($rows as $fdo) {
				echo '<option value="'.$fdo['LoginID'].'">'.$fdo['FName'].' '.$fdo['LName'].'</option>';
				}
			echo '</select>';// Close
		?>
	</div>
	<div class="col-sm-2">
		<input type="submit" value="Add" name="AddInst" id="AddInst" class="btn btn-primary btn-md submit">
	</div>
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