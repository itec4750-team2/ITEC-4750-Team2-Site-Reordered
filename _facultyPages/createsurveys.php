<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Surveys';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
// ++++ Change: Added survey_do object 10/28 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/new_survey_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');

// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='yoursurveys';
?>

<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<!-- ++++ Change: Added Survey List by LoginID 10/28/17 KM ++++ -->
		<?php 
		if($LoginID!=0){?>
			<h2 class="center">Create Group Survey</h2>
			<h3 class="center">Using Existing Questions</h3>
			<?php 
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/create_gsurvey.php');
			}
			?>
	</div>
</div>
	
	<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>

</body>
</html>