<?php 
//++
//++ Work Flag: Fix issue that is causing a heading to be missing
// Change Added overall_rating template 11/4/17 KM

// Averages the average scores for an overall team-member rating.
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
$reportdo = new Report_DO();
$r=$reportdo->indivAverage($LoginID, $Subj);
$OAvg=0.0;
$Total=0.0;
$overall='';

$i=0.0;
//Get Overall Average
foreach($r as $value){
	$Total = $Total + $value['AvgR'];
	$i++;
}
if($i!=0){
$OAvg=$Total/$i;
}
else {$OAvg=0.0;}
//Missing a levels...rework
    if($OAvg==1.0){$overall = 'Excellent';}
    if($OAvg>1.0 && $OAvg<=1.5){$overall = 'Great';}
	if($OAvg>1.5 && $OAvg<=2.0 ){$overall = 'Good';}
	if($OAvg>2.0 && $OAvg<=2.5){$overall = 'Fair';}
    if($OAvg>2.5 && $OAvg<=3.0){$overall = 'Mediocre';}
	if($OAvg>3.0 && $OAvg<=3.5){$overall = 'Poor';}	
	if($OAvg>3.5 && $OAvg<=4.0){$overall = 'Bad';}
	if($OAvg>4.0){$overall = 'Awful';}
	//4 and Up is Awful
	if($OAvg==0.0){$overall = "No Rating Yet.";}
?>