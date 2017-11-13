<?php
class Drop_DO{
	
	//++++ Change: added all faculty drop box for update_class_pg  9/8 KM ++++
	// All Faculty Dropbox
	function facSelect(){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql = "SELECT LoginID, FName, LName From login WHERE Role= 'Faculty'
			ORDER BY LName";
		$facSel = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($facSel)){
			$all_rows[]=$row;
		}
		return $all_rows;
		mysqli_close($con);
	}
	//++++ Change: added all students drop box 9/8 KM ++++
	//All Students Dropbox
	function studSelect(){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql = "SELECT LoginID, FName, LName From login WHERE Role= 'Student'
			ORDER BY LName";
		$studSel = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($studSel)){
			$all_rows[]=$row;
		}
		return $all_rows;
		mysqli_close($con);
	}
	// Semester Dropbox
	function semSelect(){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql = "SELECT SemesterID, SemesterName, Year From semester
			ORDER BY Year, SemesterName";
			// ++++ Change: Added table order to query 9/8 KM ++++
		$semSelect = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($semSelect)){
			$all_rows[]=$row;
		}
		return $all_rows;
		mysqli_close($con);
	}
	//++++ Change: added class group drop box for class_page  9/5 KM ++++
	//Class Groups Dropbox
	function classGroups($ClassID){
		if(!empty($ClassID)){	
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			$sql = "SELECT cgroup.GroupID, cgroup.GroupName
				FROM(cgroup
				INNER JOIN class ON cgroup.ClassID=class.ClassID)
				WHERE class.ClassID = '$ClassID'
				ORDER BY cgroup.GroupID";
			// ++++ Change: Added table order to query 9/6 KM ++++
			$groupSel = mysqli_query($con, $sql);
			$all_rows = array();
			while($row = mysqli_fetch_array($groupSel)){
				$all_rows[]=$row;
			}
			return $all_rows;
			mysqli_close($con);
		}
	}	
		//++++ Change: added class question drop box for create survey page  11/11 KM ++++
	//Survey Questions Dropbox
	function surveyQuestions(){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			$sql = "SELECT * FROM gen_survey_q";
			$genSel = mysqli_query($con, $sql);
			$all_rows = array();
			while($row = mysqli_fetch_array($genSel)){
				$all_rows[]=$row;
			}
			return $all_rows;
			mysqli_close($con);
		}
	//++++ Change: Added group drop box for group assign on student_mgt_pg 9/6 KM ++++
	//All Groups Dropbox
	function allGroups(){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql = "SELECT cgroup.GroupID, cgroup.GroupName, class.ClassID
			FROM(cgroup
			INNER JOIN class ON cgroup.ClassID=class.ClassID)
			ORDER BY class.ClassID, cgroup.GroupID";
		$allgroups = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($allgroups)){
			$all_rows[]=$row;
		}
		return $all_rows;
		mysqli_close($con);
	}
	//++++ Change: Added all classes drop box for group assign on student_mgt_pg 9/6 KM ++++
	//Classes Dropbox
	function allClasses(){
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql = 'SELECT class.ClassID, semester.SemesterName, semester.Year, class.ExpDate, class.ClassNO, class.ClassName  
			FROM(class
			INNER JOIN semester ON semester.SemesterID=class.SemesterID)
			WHERE DATEDIFF(class.ExpDate, NOW())>0
			ORDER BY class.ClassID, class.ClassNO';
		$allClassSel = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($allClassSel)){
			$all_rows[]=$row;
		}
		return $all_rows;
		mysqli_close($con);		
	}
	//++++ Change: Added completedSurveys for  new_survey page 10/29 KM ++++
	//Survey Dropbox
	function completedSurveys($LoginID, $GroupID, $GSurveyID){
		//echo $LoginID.','. $GSurveyID.','. $GroupID;
		include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
		$sql = "SELECT DISTINCT r.TeamMemberID
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
				&& a.GroupID = '$GroupID'
				ORDER BY r.TeamMemberID
			";
		$survey = mysqli_query($con, $sql);
		$all_rows = array();
		while($row = mysqli_fetch_array($survey)){
			$all_rows[]=$row;
		}
		return $all_rows;	
		mysqli_close($con);
	}

	//Lists All Students Assigned to a Group
	function studentGroups($GroupID){
			if(!empty($GroupID)){
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				// ++++ change added group info to class_page. Updated query for group assigned 9/5 KM++++
				$sql = "SELECT DISTINCT login.LoginID
					FROM(((class
					INNER JOIN cgroup ON class.ClassID=cgroup.ClassID)
					INNER JOIN group_assign ON cgroup.GroupID=group_assign.GroupID)
					INNER JOIN login ON group_assign.LoginID=login.LoginID)
					WHERE login.Role = 'Student' && group_assign.GroupID='$GroupID' 
					ORDER BY login.LoginID";
				// ++++ Change: Added table order to query 9/6 KM ++++
				$getGroups = mysqli_query($con, $sql);
				//output data of each row
				$all_rows = array();
				while($row = mysqli_fetch_array($getGroups)){
					$all_rows[]=$row;
				}
				return $all_rows;
			}
			mysqli_close($con);
		}

}
?>