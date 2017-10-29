<?php
// ++++ Change: Added indentation 9/8 KM ++++
class Survey_DO{
// -- Create

// -- Read 
	// ++++ Change: Verify user is faculty 9/8 KM ++++
	// Load All Surveys, verify user is faculty

	// Load Survey by User LoginID, for faculty or students
	public function loadByLoginID($LoginID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			//Load by LoginID
			$sql = "SELECT DISTINCT g.GroupID, g.GroupName, c.ClassName, c.ExpDate 
				FROM ((((login l
				JOIN class_assign a
				ON l.LoginID=a.LoginID)
				JOIN class c
				ON a.ClassID=c.ClassID)
				JOIN cgroup g
				ON g.ClassID=c.ClassID)
				JOIN group_survey_q s
				ON g.GroupID=s.GroupID)
				WHERE l.LoginID = '$LoginID' && DATEDIFF(ExpDate, NOW())>0";
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
		$sql="SELECT c.ClassName, g.GroupName, s.QuestionNum, q.QuestionTxt, s.GSurveyName 
			FROM (((class c
			JOIN cgroup g
			ON g.ClassID=c.ClassID)
			JOIN group_survey_q s
			ON g.GroupID=s.GroupID)
			JOIN gen_survey_q q 
			ON q.QuestionID = s.QuestionID)
			WHERE s.GroupID ='$GroupID'
			ORDER BY s.QuestionNum";
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
