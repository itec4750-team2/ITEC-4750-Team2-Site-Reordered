<?php 
// ++++ Change: Adjusted indentation 9/7 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/group_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
$P='stud_mgmt_pg';
?>
<div class="wrapper">
	<main>
		<!-- Main Content Section-->
			<?php
			if(!empty($_GET['stid'])){
				$StID = $_GET['stid'];
				}
			else{echo "Uh-oh! - Can't Find the Student ID";}
			if(!empty ($StID)){?>
			<h1> Student Management Page </h1>
			<br/>
			<!-- ++++ Change: Created modules for reuse 10/1 KM ++++ -->
			<form name ="assign-class" method = "POST" action="#">
				<div>
					<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/student_info.php'); ?>
				</div>
				
				<div class="clear"></div>
				
				<!-- ------------- Student Classes Info ----------->
				<h2>Assigned Classes & Groups</h2>
				<div>
					<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/enrolled_classes.php'); ?>					
				</div>
				<br/>
			
				<!-- ------------- Student Group Info ----------->
				<div>
				<?php
					//calls class data object and loads table data by LoginID
					$ClassID = 'all';
					$Subj = $StID;
					include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/group_assignments.php');
				?>
				<div>	
				<br/>
					<!-- ------------- Class Assignment Selection ----------->
				<div>
					<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/class_assign_new.php');?>
				</div>			
				<br/>					
				<div>
					<!-- ------------- Group Assignment Selection ----------->				
					<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/group_assign_new.php');?>
				</div>

	<?php } // End if StID not empty ?>

	</main>
</div><!--End wrapper-->
	
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
