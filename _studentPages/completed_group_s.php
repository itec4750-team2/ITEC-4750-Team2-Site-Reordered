<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Surveys';
include('../_templates/_headers/studentHeader.php'); 
include('../_templates/_nav/studentNav.php');//Must Fix
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');

$P='student_group_survey';
if($LoginID!=0){
	if(isset($_GET['gsid'])){$GSurveyID = $_GET['gsid'];}
// ++++ Change: Added Page Identifier 10/10 KM ++++
?>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
		<div class="row">
			<div class="col-md-10 col-centered">
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/surveyed_teammates.php');?>
			</div>
		</div>
	</div>
<?php
}
 include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/footer.php');?>
</body>
</html>