<?php
// ++++ Change: Added My Students Page 9/24 KM ++++
// ++++ Change: Added Title 10/25 KM ++++
$title = 'My Students';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/report_do.php');
//include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/overall_rating.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='mystudents';
?>

<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<?php 
	if($LoginID!=0){
		include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/my_students.php');
	}?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>

</body>
</html>