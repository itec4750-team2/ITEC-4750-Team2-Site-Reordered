<!---------------------------- Display Class Info --------------------->
	<div class="form-group">
		<label class="control-label col-sm-4" for="ClassNO">Class Number: </label>
		<div class="col-sm-6">
		<input type="text" name="ClassNO" id="ClassNO" placeholder="ITEC Number" class="form-control" value= <?php echo "'". $ClassNO ."'";?>required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="ClassName">Class Name: </label>
		<div class="col-sm-6">
		<input type="text" name="ClassName" id="ClassName" placeholder="Class Name" class="form-control" value= <?php echo "'". $ClassName ."'";?>required>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-4" for="ExpDate">Class Expires: </label>
		<div class="col-sm-6">
		<input type="date" name="ExpDate" id="ExpDate" placeholder="Expiration Date" class="form-control" value= <?php echo "'". $ExpDate ."'";?> required>
		</div>
	</div>
		<!----------------- Semester DropBox ------------>
	<div class="form-group">
	<!-- ++++ Change: Created reusable module for semester_select 9/30 KM-->
		<?php
		include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/semester_select.php');
		?>
	</div>
	<br/>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-9">
			<input type="submit" value="Update Class" name="UpdateClass" id="UpdateClass" class="btn btn-primary btn-lg submit">
		</div>
	</div>
<!--------------- Update Class ------------------>
<?php
	if(isset($_POST['UpdateClass'])){
		$updateClass = new Classes(array(
			'LoginID' => $_SESSION['LoginID'], // User
			'ClassID' => $ClassID,
			'ClassNO' => $_POST['ClassNO'],
			'ClassName' => $_POST['ClassName'],
			'SemesterID' => $_POST['SemesterID'],
			'ExpDate' => $_POST['ExpDate']));
		$updateClass->upDateClass();
		if($updateClass){
			echo "<script>window.open('update_class.php?cid=$ClassID','_self') </script>"; // reloads page to show updated information
		}
	}
?>