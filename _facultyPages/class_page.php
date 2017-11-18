<?php
// ++++ Change: Adjusted indentation 9/7 KM ++++
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Class Page';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
// ++++ Change: Moved to this procedure to class_assign_do (previously part of stu_do) 9/5 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/group_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
// ++++ Change: Added Check for IDs module 10/12 KM ++++

// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
$P='class_page';
?>
<!-- Main Content Section-->
<main>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
		<?php
		// Catch for not logged in and ClassID missing
		if($LoginID != 0){
			if(empty($ClassID)){
				echo '<div class="error">Uhoh problem getting user login or ClassID</div>'; // Missing ClassID Error msg.
			}
			else{
				// --------------- Class Information -------------
				// ++++ Change: Created Reusable Module to list class info 9/30 KM ++++
			?>
				<!-- Get Class Information -->
				<div class ="ctrPg">
					<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/class_information.php');?>
				</div>
				
				<div class="clear"></div>
				<br/>
				<div class="row">
					<div class="col-md-5 col-centered">	
						<div>
							<br/>
							<?php
								//Update class, Delete class & Add Student links.
								echo '<span class="two"><a href="../../_templates/_delete/delete_class.php?cid='.$value['ClassID'].'">';
								echo 	'<img class ="med_icon" src="../_images/delete_class.png" alt="Delete"></a>'; // delete class
								echo '<br/><a href="../../_templates/_delete/delete_class.php?cid='.$value['ClassID'].'"'.'>Delete Class</a></span>';
							?>
							<!-------------------------------------------------------------------->
							<?php
								echo '<span class="two"><a href="update_class.php?cid='.$value['ClassID'].'">';
								echo 	'<img class ="med_icon" src="../_images/update.png" alt="Update"></a>'; // update class
								echo '<br/><a href="update_class.php?cid='.$value['ClassID'].'"'.'>Update Class</a></span>';
							?>

							<div>
							<?php // ++++ Change: Add 'Add Students' Button 9/29 KM ++++
								echo '<span class="two"><a href="add_student.php?cid='.$ClassID.'">';
								echo 	'<img class ="med_icon" src="../_images/person_add.png" alt="Add New Student"></a>'; // Add New student
								echo '<br/><a href="add_student.php?cid=' . $ClassID .'&p='.$P;
								echo 	'"'.'>New Student</a></span>';
							?>
							</div>

							<div class="clear"></div>
						</div>
					</div>
						<br/>
						<br/>
						<div>
							<?php  include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/studdb_assign.php'); ?>
						</div>
						<br/>
						<br/>
							<?php
								// Lists student's assigned to a class. Hides table if empty.
								// ++++ Change: Created Reusable Module to list students 9/30 KM ++++
								include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/enrolled_students.php');
							?>
						<?php } // End else
				}?>
			
		</div>
	</div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>