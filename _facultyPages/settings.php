<?php
$title = 'Faculty Settings';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
 $P='settings';
 $Subj = $LoginID;
 ?>
 
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updateProfile.php'); ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updatePassword.php'); ?>
<?php // ---------------- Password Reset via Emai ------------->
include($_SERVER['DOCUMENT_ROOT'].'/_templates/forgotpassword.php');
?>	

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>


