<?php //++++ Change moved code to add_class template  11/16 KM++++?>
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
			<?php
				//Add Class
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
</div>
