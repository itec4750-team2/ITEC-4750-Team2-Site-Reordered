<?php
/* --
--- -- --- WORK FLAG
--- This page still needs work. Maybe use a <datalist> populated with classes offered. -- 9/8 KM
--- Needs Msg that tells user that class is already listed.
--- -- */
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Add Class';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
// ++++ Change: Added page identifier 10/10 KM ++++
$P='add_class';
// ++++ Change: Added Check for IDs module 10/12KM ++++

// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
?>

<!-- Main Content Section-->
<main>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
		<div class="row">
			<div class="col-md-6 col-centered">
				<form name="create-class" method="POST" class="form-horizontal">
					<fieldset>
					<!-- Class Item Number-->
					<div class="form-group">
						<label class="control-label col-sm-4" for="ClassID">Class Item Number</label>
						<div class="col-sm-7">
						<input type="number" name="ClassID" id="ClassID" placeholder="Item Number" class="form-control" required>
						</div>
					</div>
					<!-- Class Number -->
					<div class="form-group">
						<label class="control-label col-sm-4" for="ClassNO">Class Number</label>
						<div class="col-sm-7">
						<input type="text" name="ClassNO" id="ClassNO" placeholder="ITEC Number" class="form-control" required>
						</div>
					</div>
					<!-- Class Name -->
					<div class="form-group">
						<label class="control-label col-sm-4" for="ClassName">Class Name</label>
						<div class="col-sm-7">
						<input type="text" name="ClassName" id="ClassName" placeholder="Class Name" class="form-control" required>
						</div>
					</div>
					<!-- Class Expires -->
					<div class="form-group">
						<label class="control-label col-sm-4" for="ExpDate">Class Expires</label>
						<div class="col-sm-7">
						<input type="date" name="ExpDate" id="ExpDate" placeholder="Expiration Date" class="form-control" required>
						</div>
					</div>
					<!----------------- Semester DropBox ------------>
					<div class="form-group">
						<label class="control-label col-sm-4" for="SemesterID">Semester</label>
						<div class="col-sm-7">
							<?php
								// -- Calls semSelect dropdown box from drop_do.php
								$dropdo = new Drop_DO($LoginID);
								$rows=$dropdo->semSelect();
								echo '<select name="SemesterID" class="form-control" required>'; // Open
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
					</fieldset>
				</form>

					<!----------------- Add Class ------------------>
					<div>
						<?php
							if(isset($_POST['AddClass'])){
								$newClass = new Classes(array(
									'LoginID' => $LoginID,
									'ClassID' => $_POST['ClassID'],
									'ClassNO' => $_POST['ClassNO'],
									'ClassName' => $_POST['ClassName'],
									'SemesterID' => $_POST['SemesterID'],
									'ExpDate' => $_POST['ExpDate']));
								$newClass->createClass();
								if($newClass){
									echo '<div class="success">Success!</div>';
									// ++++ Change: Added Check for sending page module 10/12 KM ++++
									// Gets sending page and redirects
									include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getP-Fac.php');

								}
							}
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>