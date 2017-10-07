<?php 
// ++++ Change: Adjusted indentation 9/8 KM ++++
/* --
--- -- --- WORK FLAG
---This page still needs work. Maybe use a <datalist> populated with classes offered. -- 9/8 KM
--- -- */
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
?>
<!-- Main Content Section-->
<div class="wrapper">
	<div id="main">
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
					<form name="update-class" method="POST">	
						<!--------------------------- Get Class Info ------------------------>		
						<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/class_information.php');?>	
						<br/>
						<h2> Update Class Information </h2>
						<br/>
						<!--------------- Add Instructor Assignment ------------------>
						<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/instructor_assign.php');?>	
						<!--------------- Remove Instructor Assignment ------------------>		
						<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_delete/instructor_remove.php');?>
						<!---------------------------- updateClass Form --------------------->
						<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updateClass.php');	?>			
					</form>
		<?php }} // End else !empty LoginID & ClassID?>
	</main>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
