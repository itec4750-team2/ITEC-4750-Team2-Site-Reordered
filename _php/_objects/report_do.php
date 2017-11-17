<?php
// ++++ Change: Added indentation 9/8 KM ++++
class Report_DO{
// -- Create

// -- Read 

	//Load User's Individual Average  $LoginID
	public function indivAverage($LoginID, $Subj){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		if(!empty($LoginID)){
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole);
			if (mysqli_num_rows($getRole) > 0) {
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty' || ($Subj == $LoginID)){ //User or Faculty
							//split into two
							$sql="SELECT l.loginID, l.FName, l.LName, gen.QKey, 
								Count(r.ResponseValue) AS '# Surveys', Round(Avg(r.ResponseValue), 2) AS AvgR
															
								FROM login l
								JOIN group_assign a
								ON l.LoginID=a.LoginID

								JOIN survey_responses r
								ON l.LoginID=r.TeamMemberID

								JOIN gen_survey_q gen
								ON r.QuestionID=gen.QuestionID

								JOIN surveys s
								ON r.GSurveyID=s.GSurveyID

								WHERE r.TeamMemberID = '$Subj'
								GROUP BY gen.QuestionID
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
				}
			}
	}
	mysqli_close($con);	
	}
		//Load User's Individual  $LoginID
	public function indvReports($LoginID, $Subj, $GSurveyID, $Subj2){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		if(!empty($LoginID)){
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole);
			if (mysqli_num_rows($getRole) > 0) {
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty' || ($Subj == $LoginID)){ //User or Faculty
							//split into two
							$sql="SELECT DISTINCT r.LoginID, gen.QKey, r.QuestionID, s.GSurveyName,
							r.TeamMemberID, r.GSurveyID, 
							a.GroupID, l.LName, l.FName, r.ResponseValue,
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
                            
                            JOIN surveys s
							ON r.GSurveyID=s.GSurveyID
                            
							JOIN gen_survey_q gen
							ON r.QuestionID=gen.QuestionID
                            				
							WHERE (r.GSurveyID = '$GSurveyID'
							&& r.TeamMemberID = '$Subj')
							&& r.LoginID = '$Subj2'
							
							ORDER BY r.GSurveyID, r.QuestionID
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
				}
			}
	}
	mysqli_close($con);	
	}
	//Load Report Headers
	public function reportHeaders($LoginID, $Subj, $GSurveyID, $Subj2){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		if(!empty($LoginID)){

			//Get Header Info
			$sql="SELECT DISTINCT gen.QKey, r.QuestionID, s.GSurveyName, r.GSurveyID

							FROM login l
							JOIN group_assign a
							ON l.LoginID=a.LoginID

							JOIN survey_responses r
							ON l.LoginID=r.TeamMemberID
                            
                            JOIN surveys s
							ON r.GSurveyID=s.GSurveyID
                            
							JOIN gen_survey_q gen
							ON r.QuestionID=gen.QuestionID
                            				
							WHERE (r.GSurveyID = '$GSurveyID'
							&& r.TeamMemberID = '$Subj')
							&& r.LoginID = '$Subj2'
							
							ORDER BY r.GSurveyID, r.QuestionID
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
public function getEvaluators($LoginID, $Subj){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		if(!empty($LoginID)){
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole);
			if (mysqli_num_rows($getRole) > 0) {
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty' || ($Subj == $LoginID)){ //User or Faculty
							//split into two
							$sql="SELECT DISTINCT r.LoginID, r.TeamMemberID, 
							a.GroupID, l.LName, l.FName, r.GSurveyID
							FROM login l
							JOIN group_assign a
							ON l.LoginID=a.LoginID

							JOIN survey_responses r
							ON l.LoginID=r.TeamMemberID
													
							WHERE r.TeamMemberID='$Subj'
							ORDER BY r.GSurveyID
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
				}
			}
	}
	mysqli_close($con);	
	}

// -- Update

// -- Delete
}
?>
