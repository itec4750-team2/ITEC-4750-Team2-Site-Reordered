<!---------------------------- Display Class Info --------------------->
	<div>
		<label for="ClassNO">Class Number: </label>
		<input type="text" name="ClassNO" id="ClassNO" placeholder="ITEC Number"  value= <?php echo "'". $ClassNO ."'";?>required>
	</div>

	<div>
		<label for="ClassName">Class Name: </label>
		<input type="text" name="ClassName" id="ClassName" placeholder="Class Name" value= <?php echo "'". $ClassName ."'";?>required>
	</div>

	<div>
		<label for="ExpDate">Class Expires: </label>
		<input type="date" name="ExpDate" id="ExpDate" placeholder="Expiration Date"value= <?php echo "'". $ExpDate ."'";?> required>
	</div>
		<!----------------- Semester DropBox ------------>
	<div>
	<!-- ++++ Change: Created reusable module for semester_select 9/30 KM-->
		<?php	
		include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/semester_select.php');
		?>				
	</div>
	<br/>
	<div><input type="submit" value="Update Class" name="UpdateClass" id="UpdateClass">
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