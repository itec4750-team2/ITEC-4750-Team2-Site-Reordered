<?php
// ++++ Change: Added All Students Page 9/24 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P = 'all_students';
?>

<h2 class="center">All Students</h2>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<!-- ++++ Change: Created list module for reuse 10/1 KM ++++ -->
<?php
// ++++ Change: Added Delete Button to all_students_list.php 10/8 KM ++++
// ++++ Change: Added UPDATE Button to this table in all_student_list.php 10/10 KM ++++
?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/all_student_list.php');?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>

</body>
</html>