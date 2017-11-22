<?php
// ++++ Change: Added indentation 9/8 KM ++++
class Survey_DO{
// -- Create
// ++++ Change: Added addNewSurvey KM 11/12 ++++
// Adds Survey Title and returns GSurveyID
public function addNewSurvey($LoginID, $GSurveyName){
	include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
	// -- Check that user is faculty
		if(!empty($LoginID)){//any logged in user
		$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole); 
			if(mysqli_num_rows($getRole) > 0){
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty'){		
						include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
						$sql1 = "INSERT INTO surveys(`GSurveyName`) VALUES(?);";
								$stmt = $con->prepare($sql1);
								$stmt->bind_param('s', $GSurveyName);
								$stmt->execute();
								$stmt->close();
								$last_id = mysqli_insert_id($con);
								return $last_id;
					}	
					else{ 
						echo '<div><a href="/login.php"'.'>Please Log In.</a></div>'; // Please Log In w/ link
					}
				}
			}
		}
	mysqli_close($con);	
}
// ++++ Change: Added addGroupSurvey KM 11/12 ++++
// Adds Survey Groups and Questions
public function addGroupSurvey($values){
	$LoginID = $values['LoginID'];	
	include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
	// -- Check that user is faculty
	if(!empty($LoginID)){//any logged in user
	$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
		$getRole = mysqli_query($con, $checkrole); 
		if(mysqli_num_rows($getRole) > 0){
			while($row = mysqli_fetch_array($getRole)){
				$myRole = $row['Role'];
				if ($myRole == 'Faculty'){		
					$sql = "INSERT INTO group_survey_q
						(`GSurveyID`, `QuestionNum`, `GroupID`,`QuestionID`) 
						VALUES (?, ?, ?, ?);";
						$stmt = $con->prepare($sql);
						$stmt->bind_param('iisi', $values['GSurveyID'], $values['QuestionNum'], $values['GroupID'], $values['QuestionID']);
						$stmt->execute();
						$stmt->close();		
				}
				else{ 
						echo '<div><a href="/login.php"'.'>Please Log In.</a></div>'; // Please Log In w/ link
				}	
			}
		}
	}
	mysqli_close($con);	
}

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
			echo '<div><a href="/login.php"'.'>Please Log In.</a></div>'; // Please Log In w/ link
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
			echo '<div><a href="/login.php"'.'>Please Log In.</a></div>'; // Please Log In w/ link
		}
		mysqli_close($con);	
	}
	// Load Completed Surveys for studentPages
	
	public function loadCompleted($LoginID, $GSurveyID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			//Load by LoginID
			$sql="SELECT DISTINCT s.GSurveyID, s.GSurveyName, r.TeamMemberID, l.FName, l.LName, a.GroupID
				FROM login l
				JOIN group_assign a
				ON l.LoginID=a.LoginID
                
				JOIN survey_responses r
				ON l.LoginID=r.TeamMemberID
                
				JOIN  group_survey_q grp
                ON r.QuestionID=grp.QuestionID
			  
				JOIN gen_survey_q gen
				ON r.QuestionID=gen.QuestionID

				JOIN surveys s
				ON r.GSurveyID=s.GSurveyID
				
				WHERE r.LoginID = '$LoginID' 
				&& r.GSurveyID = '$GSurveyID'
                ORDER BY  s.GSurveyName, r.TeamMemberID
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
			echo '<div><a href="/login.php"'.'>Please Log In.</a></div>'; // Please Log In w/ link
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
			echo '<div><a href="/login.php"'.'>Please Log In.</a></div>'; // Please Log In w/ link
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
			echo '<div><a href="/login.php"'.'>Please Log In.</a></div>'; // Please Log In w/ link
		}
		mysqli_close($con);	
	}
	// ++++ Change: Added editInfo KM 11/19 ++++
		//Load Surveys completed by current user && team-member (Subj)
	public function editInfo($LoginID, $Subj, $GSurveyID, $GroupID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql="SELECT DISTINCT  r.ResponseID, r.TeamMemberID, l.FName, l.LName, r.GSurveyID, grp.QuestionNum, grp.QuestionID, s.GSurveyName, gen.QuestionTxt,grp.GroupID,
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
				ON l.LoginID=r.TeamMemberID
                
				JOIN gen_survey_q gen
				ON r.QuestionID=gen.QuestionID
                
                JOIN  group_survey_q grp
                ON gen.QuestionID=grp.QuestionID
			  
				JOIN surveys s
				ON grp.GSurveyID=s.GSurveyID
									
				WHERE r.LoginID = '$LoginID'
				&& r.TeamMemberID = '$Subj'
				&& grp.GSurveyID = '$GSurveyID'
				&& r.GSurveyID = '$GSurveyID'
				&& grp.GroupID = '$GroupID'
				ORDER BY grp.QuestionNum";
			$getSurvey = mysqli_query($con, $sql); 
			// output data of each row
			$all_rows = array();
			while($row = mysqli_fetch_array($getSurvey)){
				$all_rows[]=$row;
			}
			return $all_rows; 
		}
		else{
			echo '<div><a href="/login.php"'.'>Please Log In.</a></div>'; // Please Log In w/ link
		}
		mysqli_close($con);	
	}
			
// -- Update
	// Update a survey.
	public function updateSurvey($LoginID, $ResponseValue, $ResponseID){
		if(!empty($LoginID)){
			
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
						// --Update Survey				
						$sql = "UPDATE survey_responses SET ResponseValue=? WHERE ResponseID=?;";
							$stmt = $con->prepare($sql);
							$stmt->bind_param("ii",  $ResponseValue, $ResponseID);
							$stmt->execute();
							$stmt->close();
					}
					else{ 
						echo '<div><a href="/login.php"'.'>Please Log In.</a></div>'; // Please Log In w/ link
					}
					mysqli_close($con);	
	}					
// -- Delete
}
?>
