<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Faculty Settings';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
 $P='settings';
 $Subj = $LoginID;
 ?>
 <div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-7 col-centered">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updateProfile.php'); ?>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updatePassword.php'); ?>
		</div>
			<?php // ---------------- Password Reset via Emai ------------->
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/forgotpassword.php');
			?>	

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>


