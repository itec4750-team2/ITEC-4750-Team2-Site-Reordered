<div>	
	<!----------------- Current Inst Select -------------->			
	<!-- ++++ Change: Added instructor assignment removal dropbox from class_assign_do 9/8 KM ++++ -->				
	<label for="OFID">Remove: </label>	
	<?php
		$instr = new CA_DO();
		$facs=$instr->listClassInstrs($value['ClassID']);
		echo '<select name="OFID" required>'; // Open
		echo '<option value="none" selected>Remove Instructor</option>'; // Auto Select Current Instructor
			foreach ($facs as $val) {
			  echo '<option value="'.$val['LoginID'].'">'.$val['LoginID'].' '.$val['FName'].' '.$val['LName'].'</option>';
			}
		echo '</select>';// Close					
	?>
	<input type="submit" value="Remove" name="DelInst" id="DelInst">	
</div>

<?php 
	if(isset($_POST['DelInst']) && $_POST['OFID']!='none'){
		$delInst  = new Class_Assign(array(
			'LoginID' => $_SESSION['LoginID'], // User
			'Subj' => $_POST['OFID'], // Class Assign Subject - Previous Instructor
			'ClassID' => $ClassID));
		$delInst->delClassA();
		if($delInst){
			echo "<script>window.open('update_class.php?cid=$ClassID','_self') </script>"; // reloads page to show updated information
		}	
	}
	else if(isset($_POST['DelInst']) && $_POST['FID']=='none'){
		$errorMsg = '<br/><div class="error">Please select instructor to remove.</div>'; 
		echo $errorMsg;
	}
?>