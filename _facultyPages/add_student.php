<?php
// ++++ Change: Created Add Student 10/10 KM ++++
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Add Student';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/profile_model.php');
// ++++ Change: Added page identifier 10/10 KM ++++
$P='add_student';
?>
<main>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
			<div class="row">
				<div class="col-md-7 col-centered">
	<?php
		if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
		if(empty($ClassID)){echo '<div class="error">Uhoh problem getting user login or ClassID</div>';}
		else{
			if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>'; }
			else{
				?>
				<h2>Create New Student</h2>
				<!-- ++++ Change: Created modules for reuse 10/1 KM ++++ -->
				<?php
				include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/add_profile.php');
				include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/class_assign_new.php');
			}
		}
	?>
			</div>
		</div>
	</div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
