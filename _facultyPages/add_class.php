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

<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-6 col-centered">
			<form name="create-class" method="POST" class="form-horizontal">
				<fieldset>
					<!-- Class Item Number -->
					<div class="form-group">
						<label class="control-label col-sm-3" for="ClassID">Class Item Number:</label>
						<div class="col-sm-7">
							<input type="number" name="ClassID" id="ClassID" class="form-control inputColor" placeholder="Item Number" required>
						</div>
					</div>
					<!-- Class Number -->
					<div class="form-group">
						<label class="control-label col-sm-3" for="ClassNO">Class Number:</label>
						<div class="col-sm-7">
							<input type="text" name="ClassNO" id="ClassNO" class="form-control inputColor" placeholder="ITEC Number" required>
						</div>
					</div>
					<!-- Class Name -->
					<div class="form-group">
						<label class="control-label col-sm-3" for="ClassName">Class Name:</label>
						<div class="col-sm-7">
							<input type="text" name="ClassName" id="ClassName" class="form-control inputColor" placeholder="Class Name" required>
						</div>
					</div>
					<!-- Class Expires -->
					<div class="form-group">
						<label class="control-label col-sm-3" for="ExpDate">Class Expires:</label>
						<div class="col-sm-7">
							<input type="date" name="ExpDate" id="ExpDate" class="form-control inputColor" placeholder="Expiration Date" required>
						</div>
					</div>
					<!-- Semester DropBox -->
					<div class="form-group">
						<label class="control-label col-sm-3" for="SemesterID">Semester:</label>
						<div class="col-sm-7">
							<?php
								// -- Calls semSelect dropdown box from drop_do.php
								$dropdo = new Drop_DO($_SESSION['LoginID']);
								$rows=$dropdo->semSelect();
								echo '<select name="SemesterID" class="form-control inputColor" required>'; // Open
									foreach ($rows as $ddo) {
									echo '<option value="'.$ddo['SemesterID'].'">'.$ddo['SemesterName'].' '.$ddo['Year'].'</option>';
									}
								echo '</select>';// Close

							?>
						</div>
					</div>
					<!-- Submit form  -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="submit" value="Add Class" name="AddClass" id="AddClass" class="btn btn-primary btn-lg submit">
						</div>
					</div>

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
				</fieldset>
			</form>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>