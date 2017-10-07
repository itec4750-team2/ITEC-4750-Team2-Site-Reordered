<?php
// ++++ Change: Added All Students Page 9/24 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
?>
<h2 class="center">All Students</h2>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<?php
	// ++ Work Flag
	// ++ Add Buttons to this table in all_student_list.php
	// ++
	?>
	<!-- ++++ Change: Created module for reuse 10/1 KM ++++ -->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/all_student_list.php');?>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>