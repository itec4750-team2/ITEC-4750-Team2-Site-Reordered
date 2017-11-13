<?php
// ++++ Change: Added indentation 9/8 KM ++++
class Survey_DO{
// -- Create
public function addSurvey($values){
	$LoginID = $values['LoginID'];
	if(!empty($LoginID)){//any logged in user
		//echo $values['GSurveyID'].','. $values['GroupQID'].','. $values['Subj'].','. $values['ResponseValue'];
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql = "INSERT INTO survey_responses
				(`LoginID`,`GSurveyID`, `QuestionID`, `TeamMemberID`, `ResponseValue`) 
				VALUES (?, ?, ?, ?, ?);";
				$stmt = $con->prepare($sql);
				$stmt->bind_param('iiiii', $values['LoginID'], $values['GSurveyID'], $values['QuestionID'], $values['Subj'], $values['ResponseValue']);
				$stmt->execute();
				$stmt->close();		
		}
	else{ 
			echo '<div class ="error">Please Login.</div>'; 
		}	
		mysqli_close($con);	
}

// -- Read 

	// Load All Surveys, verify user is faculty

	// Load Survey by User LoginID, for faculty or students
	public function loadByLoginID($LoginID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			//Load by LoginID
			$sql = "SELECT DISTINCT g.GroupID, g.GroupName, c.ClassName, c.ExpDate, grp.GSurveyID, s.GSurveyName
				FROM login l
				JOIN class_assign a
				ON l.LoginID=a.LoginID
				JOIN class c
				ON a.ClassID=c.ClassID
				JOIN cgroup g
				ON g.ClassID=c.ClassID
                JOIN group_survey_q grp
				ON g.GroupID=grp.GroupID
                JOIN surveys s
                ON grp.GSurveyID=s.GSurveyID
                WHERE l.LoginID='$LoginID'
                && DATEDIFF(ExpDate, NOW())>0";
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
		mysqli_close($con);	
	}
		// Load Survey by Group, for faculty or students
	public function loadByGroupID($LoginID, $GroupID, $GSurveyID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			//Load by LoginID
		$sql="SELECT c.ClassName, g.GroupName, s.QuestionNum, s.QuestionID, q.QuestionTxt, n.GSurveyName
			FROM (((class c
			JOIN cgroup g
			ON g.ClassID=c.ClassID)
			JOIN group_survey_q s
			ON g.GroupID=s.GroupID)
			JOIN gen_survey_q q 
			ON q.QuestionID = s.QuestionID)
			JOIN surveys n
			ON s.GSurveyID=n.GSurveyID
			WHERE s.GroupID ='$GroupID' && n.GSurveyID='$GSurveyID'
			ORDER BY s.QuestionNum
			";
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
		mysqli_close($con);	
	}
	//Load Surveys completed by current user ($LoginID)
	public function completedSurveys($values){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql="SELECT 
			SELECT r.LoginID, r.TeamMemberID, r.GSurveyID, a.GroupID, l.LName, l.FName,
				CASE r.ResponseValue
				WHEN 1 THEN 'Excellent'
				WHEN 2 THEN 'Good'
				WHEN 3 THEN 'Mediocre'
				WHEN 4 THEN 'Bad'
				WHEN 5 THEN 'Awful' 
				END AS Response

				FROM login l
				JOIN group_assign a
				ON l.LoginID=a.LoginID

				JOIN survey_responses r
				ON l.LoginID=r.LoginID
			  
				JOIN gen_survey_q gen
				ON r.QuestionID=gen.QuestionID

				JOIN surveys s
				ON r.GSurveyID=s.GSurveyID
				
				WHERE r.LoginID = '$LoginID'
				&& r.GSurveyID = '$GSurveyID'
				&& a.GroupID = '$GroupID'";
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
		mysqli_close($con);	
	}
		
// -- Update

// -- Delete
}
?>
