<?php
$title = 'Student Settings';
 include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/studentHeader.php');
	//-- Sets up data for the side navigation bar. --
 include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/studentNav.php');
 $P='studentSettings';
 $Subj = $LoginID;
 ?>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-5 col-centered">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updateProfile.php'); ?>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updatePassword.php'); ?>
			<?php // ---------------- Password Reset via Emai ------------->
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/forgotpassword.php');
			?>
		</div>
	</div>
</div>

	<footer>

	</footer>

</body>
</html>


