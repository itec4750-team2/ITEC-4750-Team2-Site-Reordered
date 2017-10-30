<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Surveys';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='yoursurveys';
?>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-7 col-centered">
		<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/new_survey.php');?>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>

</body>