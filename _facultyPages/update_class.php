<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
/* --
--- -- --- WORK FLAG
---This page still needs work. Maybe use a <datalist> populated with classes offered. -- 9/8 KM
--- -- */
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Update Class';
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P = 'update_class';
?>
<!-- Main Content Section-->
<main>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
		<div class="row">
			<div class="col-md-5 col-centered">
				<?php
				// ++++ Change: Added Catch for not logged in and ClassID missing 9/30 KM ++++
				if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
				if(empty($ClassID)){
						echo '<div class="error">Uhoh problem getting user login or ClassID</div>';
					}
					else{
						if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>'; }
						else{
				?>
							<!-- ++++ Change: Created reusable modules & included in form 9/30 KM ++++-->
							<form name="update-class" method="POST" class="form-horizontal">
								<!--------------------------- Get Class Info ------------------------>
								<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/class_information.php');?>
								<br/>
								<h3><b>Update Class Information</b></h3>
								<!--------------- Add Instructor Assignment ------------------>
								<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/instructor_assign.php');?>
								<!--------------- Remove Instructor Assignment ------------------>
								<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_delete/instructor_remove.php');?>
								<!---------------------------- updateClass Form --------------------->
								<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updateClass.php');	?>
							</form>
				<?php }} // End else !empty LoginID & ClassID?>
			</div>
		</div>
	</div>
</main>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
