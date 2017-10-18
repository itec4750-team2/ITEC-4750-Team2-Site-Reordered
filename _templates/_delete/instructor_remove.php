<div class="form-group">
	<!----------------- Current Inst Select -------------->
	<!-- ++++ Change: Added instructor assignment removal dropbox from class_assign_do 9/8 KM ++++ -->
	<label class="control-label col-sm-4" for="OFID">Remove: </label>
	<div class="col-sm-6">
		<?php
			$instr = new CA_DO();
			$facs=$instr->listClassInstrs($value['ClassID']);
			echo '<select name="OFID" class="form-control" required>'; // Open
			echo '<option value="none" selected>Remove Instructor</option>'; // Auto Select Current Instructor
				foreach ($facs as $val) {
				echo '<option value="'.$val['LoginID'].'">'.$val['LoginID'].' '.$val['FName'].' '.$val['LName'].'</option>';
				}
			echo '</select>';// Close
		?>
	</div>
	<div class="col-sm-2">
		<input type="submit" value="Remove" name="DelInst" id="DelInst" class="btn btn-primary btn-md submit">
	</div>
</div>

<?php
	if(isset($_POST['DelInst']) && $_POST['OFID']!='none'){
		$delInst  = new Class_Assign(array(
			'LoginID' => $_SESSION['LoginID'], // User
			'Subj' => $_POST['OFID'], // Class Assign Subject - Previous Instructor
			'ClassID' => $ClassID));
		$delInst->delClassA();
		if($delInst){
			// ++++ Change: Added Check for sending page module 10/8KM ++++
			// Gets sending page and redirects
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getP-Fac.php');
		}
	}
	else if(isset($_POST['DelInst']) && $_POST['FID']=='none'){
		$errorMsg = '<br/><div class="error">Please select instructor to remove.</div>';
		echo $errorMsg;
	}
?>