<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Survey Report';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/report_do.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='indv_survey_report';
?>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
		<div class="col-md-7 col-centered">
	<?php if($LoginID !=0 && !empty($Subj)){
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/indiv_avgreport.php');
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/indiv_report.php');			
		}?>
		</div>
	</div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>

</body>