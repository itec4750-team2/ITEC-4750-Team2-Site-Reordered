<?php 
// Change Added new_survey template 10/29/17 KM
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
$reportdo = new Report_DO();
$ro=$reportdo->getEvaluators($LoginID, $Subj);

$evaluators = array();

// Get evaluators
$i=0;		
foreach($ro as $e){
	$eval=$e['LoginID'].$e['GSurveyID'];
	$evaluators[$i] = $eval;
	$i++;
}
//Count Evaluations
$evallength=count($evaluators);
?>