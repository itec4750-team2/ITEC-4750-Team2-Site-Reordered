<?php
// ++++ Change: Added indentation 9/8 KM ++++
class Survey_DO{
// -- Create
// -- Tracks who each user has completed surveys for but maintains confidentiality
public function addSurvey($values){
	$LoginID = $values['LoginID'];
	if(!empty($LoginID)){//any logged in user
		//echo $values['GSurveyID'].','. $values['GroupQID'].','. $values['Subj'].','. $values['ResponseValue'];
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql = "INSERT INTO survey_responses
				(`GSurveyID`, `GroupQID`, `TeamMemberID`, `ResponseValue`) 
				VALUES (?, ?, ?, ?);";
				$stmt = $con->prepare($sql);
				$stmt->bind_param('iiii', $values['GSurveyID'], $values['GroupQID'], $values['Subj'], $values['ResponseValue']);
				$stmt->execute();
				$stmt->close();
		
		if($values['iRound']==1){
			$sql2 = "INSERT INTO surveys_taken
				(`LoginID`, `GSurveyID`, `GroupID`, `TeamMemberID`, `Taken`) 
				VALUES (?, ?, ?, ?, ?);";
				$stmt2 = $con->prepare($sql2);
				$stmt2->bind_param('iisii',$values['LoginID'], $values['GSurveyID'], $values['GroupID'], $values['Subj'], $values['Taken']);
				$stmt2->execute();
				$stmt2->close();
				echo '<div class = "success"> Survey Added </div>';	
		}
		
		}
	else{ 
			echo '<div class ="error">Please Login.</div>'; 
		}	
}

// -- Read 
	// ++++ Change: Verify user is faculty 9/8 KM ++++
	// Load All Surveys, verify user is faculty

	// Load Survey by User LoginID, for faculty or students
	public function loadByLoginID($LoginID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			//Load by LoginID
			$sql = "SELECT DISTINCT g.GroupID, g.GroupName, c.ClassName, c.ExpDate, n.GSurveyName, n.GSurveyID
				FROM ((((login l
				JOIN class_assign a
				ON l.LoginID=a.LoginID)
				JOIN class c
				ON a.ClassID=c.ClassID)
				JOIN cgroup g
				ON g.ClassID=c.ClassID)
				JOIN group_survey_q s
				ON g.GroupID=s.GroupID)
				JOIN surveys n
				ON s.GSurveyID=n.GSurveyID
				WHERE l.LoginID = '$LoginID' && DATEDIFF(ExpDate, NOW())>0;";
			$getSurvey = mysqli_query($con, $sql); 
			// output data of each row
			$all_rows = array();
			while($row = mysqli_fetch_array($getSurvey)){
				$all_rows[]=$row;
			}
			return $all_rows; 
		}
		else{
			echo "Please Login";
		}
	}
		// Load Survey by User LoginID, for faculty or students
	public function loadByGroupID($LoginID, $GroupID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			//Load by LoginID
		$sql="SELECT c.ClassName, g.GroupName, s.QuestionNum, s.GroupQID, q.QuestionTxt, n.GSurveyName
			FROM (((class c
			JOIN cgroup g
			ON g.ClassID=c.ClassID)
			JOIN group_survey_q s
			ON g.GroupID=s.GroupID)
			JOIN gen_survey_q q 
			ON q.QuestionID = s.QuestionID)
			JOIN surveys n
			ON s.GSurveyID=n.GSurveyID
			WHERE s.GroupID ='$GroupID'
			ORDER BY s.QuestionNum;";
		$getSurvey = mysqli_query($con, $sql); 
			// output data of each row
			$all_rows = array();
			while($row = mysqli_fetch_array($getSurvey)){
				$all_rows[]=$row;
			}
			return $all_rows; 
		}
		else{
			echo "Please Login";
		}
	}
// -- Update

// -- Delete
}
?>
