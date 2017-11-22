<?php 
// Change Added new_survey template 10/29/17 KM
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
$reportdo = new Report_DO();

$ro=$reportdo->getEvaluators($LoginID, $Subj);

$evaluators = array();
$surveyid = array();
$tEval='';
$tHead='';
$SurveyName[]='';

// Get evaluators
$i=0;		
foreach($ro as $e){
	$eval=$e['LoginID'];
	$gsurveyID=$e['GSurveyID'];
	$evaluators[$i] = $eval;
	$surveyid[$i] = $gsurveyID;
	
	if(isset($surveyid[$i])){
	//For Each Evaluator create report table
	
	//Open Table
	echo '<table class="table table-striped">';

		//Get Header String
		$row=$reportdo->reportHeaders($LoginID, $Subj, $surveyid[$i], $evaluators[$i]);
		foreach($row as $h){
			$key=$h['QKey'];
			$tHead.='<th>'.$key.'</th>';
		}

		//Get Table Data 
		$rows=$reportdo->indvReports($LoginID, $Subj, $surveyid[$i], $evaluators[$i]);
		foreach($rows as $value){
			$gSurv = $value['GSurveyName'];
			$SurveyName[$i]=$gSurv;
			//$Name=$value['FName'].' '.$value['LName'];
			$tEval.='<td>'. '('.$value['ResponseValue'].') '.$value['Response'].'</td>';
		}
		
		//Commented out Name for current page use. Use if ($P==) statement to get for other pages  later if needed.
		//Echo Subject First and Last Name
		if($i == 0){
			//Echo Report Section Header	
		//	echo '<br/><h2>'.$Name.'</h2>';
			echo '<br/><h3>Individual Evaluations</h3><br/>';			
		}
				
		//Echo Report Table Caption
		$rn=$i+1;
		echo '<caption>Evaluation # '.$rn .'-A '.$SurveyName[$i].'</caption>';	
		//Echo Report Table Header String
		echo '<tr>'.$tHead.'</tr>';
		//Echo Table Data String
		echo '<tr>'.$tEval.'</tr>';
		//Clear Headers String
		$tHead='';			
		//Clear Table Data Sring
		$tEval='';
		
		$i++;
	}
	//Close Table		
	echo '</table><br/>';
	if($Role=="Student"){ echo '<a class="btn btn-primary btn-lg submit" href="../../../_studentPages/yoursurveys_student.php">Surveys Menu</a>
	<br/>';}
}
?>


