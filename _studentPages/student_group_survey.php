<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Surveys';
//include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/studentHeader.php'); //Must Fix
include($_SERVER['DOCUMENT_ROOT'].'/_templates/studentHeader.php'); 
//include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/studentNav.php');//Must Fix
include($_SERVER['DOCUMENT_ROOT'].'/_templates/studentNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');

// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='student_group_survey';
?>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-10 col-centered">
		<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/new_survey.php');?>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/footer.php');?>

</body>