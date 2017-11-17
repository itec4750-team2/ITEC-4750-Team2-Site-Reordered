<?php 
// Change Added new_survey template 10/29/17 KM
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/overall_rating.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/indiv_eval_count.php');
$reportdo = new Report_DO();
$r=$reportdo->indivAverage($LoginID, $Subj);
$tHead ='';
$tAvg='';
$Name='';

$i=0;
//Get Headers and Average
foreach($r as $value){
	$Name=$value['FName'].' '.$value['LName'];
	$tHead.='<th>'.$value['QKey'].'</th/>';
	$Avg = $value['AvgR'];
	if($Avg==1.0){$Average = 'Excellent';}
    if($Avg>1.0 && $Avg<=1.5){$Average = 'Great';}
	if($Avg>1.5 && $Avg<=2.0 ){$Average = 'Good';}
	if($Avg>2.0 && $Avg<=2.5){$Average = 'Fair';}
    if($Avg>2.5 && $Avg<=3.0){$Average = 'Mediocre';}
	if($Avg>3.0 && $Avg<=3.5){$Average = 'Poor';}	
	if($Avg>3.5 && $Avg<=4.0){$Average = 'Bad';}
	if($Avg>4.0){$Average = 'Awful';}
	//4 and Up is Awful
	if($Avg==0.0){$Average = "No Rating Yet.";}
	
	$tAvg.='<td>'.'('.$Avg.') '.$Average.'</td>';
	$i++;
}

if(!empty($Name)){
//Echo Subject First and Last Name
echo  '<br/><h2>'.$Name.'</h2>';
//Echo Report Section Header (didn't like the look)
//echo '<br/><h3>Evaluation Average</h3><br/>';
//Open Table
echo '<table class="table table-striped">';
//Echo Table Caption
echo '<caption>From '.$evallength. ' Surveys<br/>Overall Rating: <strong>'.$overall.'</strong><br/><br/>Average Evaluation Scores</caption>';
//Echo Table Headers
echo '<tr>'.$tHead.'</tr>';
//Echo Table Data
echo '<tr>'.$tAvg.'</tr>';
//Close Table
echo '</table>';
}
else{
	echo '<div>';
	echo 'No Evaluation Surveys have been completed.<br/>'; 
		if($P=='indv_survey_report'){echo '<td>' . '<a href="mystudents.php?fid='.$LoginID. '">My Students</a></td>';}
	echo '</div>';
}
//Clear Table Header String
$tHead ='';
//Clear Table Data String
$tAvg='';
?>

