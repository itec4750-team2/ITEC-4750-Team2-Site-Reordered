<?php ?>
<div>

	<!-- ++++ Change: Created All Student Dropbox module for reuse 10/1 KM ++++ 
	<!-- ++++ Change: Added student assignment add dropbox from class_assign_do 9/8 KM ++++ -->
		<div class=" col-sm-5 col-centered" id ="table-caption" >Enroll Existing Student</div>
		<br/>
		
		<form name ="assign-student" method = "POST" class="form-horizontal col-sm-5 col-centered">
	
		<div class="form-group col-centered">
	
	<?php
		//Selection Box - Select from all student list
		// ++++ Change: Added ID label to dropdown (UTA indicated confusion) 11/16 KM ++++
		$studo = new Drop_DO($_SESSION['LoginID']);
		$rows=$studo->studSelect();?>
	
		<?php
		echo '<select id="form-select" name="SID" class="form-control inputColor" required>'; // Open
		echo '<option value="none" selected>Assign Student</option>'; // Auto Select Current student
			foreach ($rows as $sdo) {
			  echo '<option value="'.$sdo['LoginID'].'">ID:'.$sdo['LoginID'].' - '.$sdo['FName'].' '.$sdo['LName'].'</option>';
			}
		echo '</select>';// Close
	?>
	</div>
	<input type="submit" value="Assign" name="AddStud" id="AddStud" class="btn btn-primary btn-md submit">
	</form>
</div>
<?php
	// ++++ Change Standalone student assign to be used with dropbox or list 10/1 KM ++++
	if(isset($_POST['AddStud']) && $_POST['SID']!='none'){	
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