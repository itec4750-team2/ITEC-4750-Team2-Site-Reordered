<?php ?>
<div>

	<!-- ++++ Change: Created All Student Dropbox module for reuse 10/1 KM ++++ 
	<!-- ++++ Change: Added student assignment add dropbox from class_assign_do 9/8 KM ++++ -->
	<form name ="assign-student" method = "POST">
	<label for="SID">Assign: </label>	
	<?php
		//Selection Box - Select from all student list
		$studo = new Drop_DO($_SESSION['LoginID']);
		$rows=$studo->studSelect();
		echo '<select name="SID" required>'; // Open
		echo '<option value="none" selected>Assign Student</option>'; // Auto Select Current student
			foreach ($rows as $sdo) {
			  echo '<option value="'.$sdo['LoginID'].'">'.$sdo['LoginID'].' '.$sdo['FName'].' '.$sdo['LName'].'</option>';
			}
		echo '</select>';// Close
	?>
	<input type="submit" value="Assign" name="AddStud" id="AddStud">
	</form>
</div>
<?php
	// ++++ Change Standalone student assign to be used with dropbox or list 10/1 KM ++++
	if(isset($_POST['AddStud']) && $_POST['SID']!='none'){	
	echo $_POST['SID'];
		$assStud = new CA_DO();
		$assStud = new Class_Assign(array(
			'LoginID' => $_SESSION['LoginID'], // User
			'Subj' => $_POST['SID'], // Class Assign Subject - New Student
			'ClassID' => $ClassID));
		$assStud->assignClass();
		
		if($assStud){
			echo "<script>window.open('class_page.php?cid=$ClassID','_self') </script>"; // reloads page to show updated information
		}			
	}
	else if(isset($_POST['AddStud']) && $_POST['SID']=='none'){
		$errorMsg = '<br/><div class="error">Please select Student to Add.</div>'; 
		echo $errorMsg;
	}
?>