<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Surveys';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
// ++++ Change: Added survey_do object 10/28 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');

// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='yoursurveys';
if($LoginID!=0){
?>

<h2 class="center">Surveys You've Created</h2>
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<div class="row">
	<!-- ++++ Change: Added Survey List by LoginID 10/28/17 KM ++++ -->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/survey_list.php');?>
	</div>
	<?php echo '<a href="'.$server.'/_facultyPages/createsurveys.php"><h2 class="center">Create Group Survey</h2></a>';?>
	<p>Using Existing Questions</p>
	<div>
	</div>
</div>
	
	<?php
}
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');
	?>

</body>
</html>