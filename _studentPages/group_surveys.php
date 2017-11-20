<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Group Surveys';
include('../_templates/_headers/studentHeader.php'); 
include('../_templates/_nav/studentNav.php');
// ++++ Change: Added survey_do object 10/28 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/survey_model.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
if($LoginID !=0){
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='group_surveys';
?>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
		<div class="row">
			<div class="col-md-12 col-centered">
				<!-- ++++ Change: Added Survey List by LoginID 10/28/17 KM ++++ -->
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/survey_list.php');?>
			</div>
		</div>
	</div>
<?php 
}
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/footer.php');?>
</body>
</html>