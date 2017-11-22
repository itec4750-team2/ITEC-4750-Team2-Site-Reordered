<?php
// ++++ Change: Added your_report for student view 11/11 KM ++++
$title = 'Your Evaluation Score Report';
include('../_templates/_headers/studentHeader.php'); 
include('../_templates/_nav/studentNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/report_do.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');

$P='your_report';
if($LoginID!=0){
$Subj = $LoginID;
?>
	<h2 class="center">Your Evaluation Scores</h2>
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
<?php 
}
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/footer.php');?>
</body>
</html>