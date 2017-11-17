<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Student Settings';
 include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/studentHeader.php');
	//-- Sets up data for the side navigation bar. --
 include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/studentNav.php');
 $P='studentSettings';
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
		</div>
	</div>
</div>
<?php// ++++ Change: Included Footer KM ++++
 include("../_templates/_footers/footer.php");?>

</body>
</html>