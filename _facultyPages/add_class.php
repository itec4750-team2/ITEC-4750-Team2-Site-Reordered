<?php 
// ++++ Change: Adjusted indentation 9/8 KM ++++
/* --
--- -- --- WORK FLAG
---This page still needs work. Maybe use a <datalist> populated with classes offered. -- 9/8 KM
--- -- */
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
?>
	
<!-- Main Content Section-->
<div class="wrapper">
	<div id="main">
		<form name="create-class" method="POST">
			<div>
				<label for="ClassID">Class Item Number</label>
				<input type="number" name="ClassID" id="ClassID" placeholder="Item Number" required>
			</div>

			<div>
				<label for="ClassNO">Class Number</label>
				<input type="text" name="ClassNO" id="ClassNO" placeholder="ITEC Number" required>
			</div>

			<div>
				<label for="ClassName">Class Name</label>
				<input type="text" name="ClassName" id="ClassName" placeholder="Class Name" required>
			</div>

			<div>
				<label for="ExpDate">Class Expires</label>
				<input type="date" name="ExpDate" id="ExpDate" placeholder="Expiration Date" required>
			</div>
			<!----------------- Semester DropBox ------------>
			<div>
				<label for="SemesterID">Semester</label>
				<?php
					// -- Calls semSelect dropdown box from drop_do.php
					$dropdo = new Drop_DO($_SESSION['LoginID']);
					$rows=$dropdo->semSelect();
					echo '<select name="SemesterID" required>'; // Open
						foreach ($rows as $ddo) {
						  echo '<option value="'.$ddo['SemesterID'].'">'.$ddo['SemesterName'].' '.$ddo['Year'].'</option>';
						}
					 echo '</select>';// Close

				?>
			</div>

			<div class="one"> <input type="submit" value="Add Class" name="AddClass" id="AddClass"></div>
			<!----------------- Add Class ------------------>
			<div>
				<?php 
					if(isset($_POST['AddClass'])){
						$newClass = new Classes(array(
							'LoginID' => $_SESSION['LoginID'],
							'ClassID' => $_POST['ClassID'],
							'ClassNO' => $_POST['ClassNO'],
							'ClassName' => $_POST['ClassName'],
							'SemesterID' => $_POST['SemesterID'],
							'ExpDate' => $_POST['ExpDate']));
						$newClass->createClass();
						if($newClass){ 
							echo '<div class="success">Success!</div>';
							echo "<script>window.open('add_class.php','_self') </script>"; // reloads page
						}
					}
				?>
			</div>
		</form>
	</main>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>