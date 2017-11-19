<?php
// ++++ Change: Adjusted indentation 9/7 KM ++++
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Student Management Page';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/group_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/report_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='stud_mgmt_pg';
?>
<main>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">

			<!-- Main Content Section-->
				<?php
				if($LoginID != 0){
				if(!empty($Subj)){?>
				<h1> Student Management Page </h1>
				<br/>
				<!-- ++++ Change: Created modules for reuse 10/1 KM ++++ -->
				
				<form name ="assign-class" method = "POST" action="#" class="form-horizontal">
					<div>
						<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/student_info.php'); ?>
					</div>
					<div class="row">
					<div class="col-md-5 col-centered">
					<?php
						echo '<div class="center"><a href="update_student.php?stid='.$StID.'">';
						echo 	'<img class ="med_icon" src="../_images/update.png" alt="Update Profile"></a>'; // update class
						echo '<br/><a href="update_student.php?stid='.$Subj.'"'.'>Update Student Profile</a></div>';
					?>
					</div>
					</div>
					<div class="clear"></div>


					<!-- ------------- Student Classes Info ----------->
					<h2>Assigned Classes & Groups</h2>
					<div>
						<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/enrolled_classes.php'); ?>
					</div>
					<br/>
					<div class="clear"></div>
					<!-- ------------- Student Group Info ----------->
					<div>
						<?php
							//calls class data object and loads table data by LoginID
							$ClassID = 'all';
							$Subj = $StID;
							include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/group_assignments.php');
						?>
					</div>
					<br/>
					<div class="row">
					<div class="col-md-5 col-centered">
							<!-- ------------- Class Assignment Selection ----------->
						<div class="clear"></div>	
						<div>
							<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/class_assign_new.php');?>
						</div>
						<div class="clear"></div>
						<br/>
						<div>
							<!-- ------------- Group Assignment Selection ----------->
							<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/group_assign_new.php');?>
						</div>
					</div>
					</div>
		<?php } // End if StID not empty
	} ?>
		</div>
	</div>
</main>


<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
