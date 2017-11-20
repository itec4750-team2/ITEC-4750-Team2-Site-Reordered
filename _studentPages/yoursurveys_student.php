<?php
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Your Group Surveys';
include('../_templates/_headers/studentHeader.php'); //Must Fix
include('../_templates/_nav/studentNav.php');
// ++++ Change: Added survey_do object 10/28 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/survey_do.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='yoursurveys_student';
if($LoginID != 0){
?>
	<div class="container">
		<h3><a href="your_report.php">Your Survey Scores</a></h3>
		<p>See your survey report here.</p>
		<br/>
		<h3><a href="group_surveys.php">Take Group Surveys</a></h3>	
		<p>Fill out surveys for your team members here.</p>
		<br/>
		<h3><a href="completed_surveys.php">Completed Surveys</a></h3>	
		<p>View or Edit Completed Surveys here.</p>
		<br/><br/>
	</div>
<?php 
}
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/footer.php');?>

</body>
</html>