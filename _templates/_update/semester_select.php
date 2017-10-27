	<!-- ++++ Change: Moved MySql out of page. Replaced with dropbox from drop_do 9/8 KM ++++ -->
					<label class="control-label col-sm-4" for="SemesterID">Semester: </label>
					<div class="col-sm-6">
						<?php
							// -- calls dropdown box  --  drop_do.php
							// -- lists all semesters for instructor to choose from.
							// -- could do similar for class names
							$dropdo = new Drop_DO($_SESSION['LoginID']);
							$rows=$dropdo->semSelect();
							echo '<select name="SemesterID" class="form-control" required>'; // Open
							echo '<option value="'.$value['SemesterID'].'" selected>'.$value['SemesterName'].' '.$value['Year'].'</option>'; // Auto Select Current Instructor
								foreach ($rows as $ddo) {
								echo '<option value="'.$ddo['SemesterID'].'">'.$ddo['SemesterName'].' '.$ddo['Year'].'</option>';
								}
							echo '</select>';// Close
						?>
					</div>