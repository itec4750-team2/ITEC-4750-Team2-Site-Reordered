<?php
	class GA_DO{
	// ++++Change Added assignGroup to use for group assignment functions. 9/7 KM ++++	
// -- Create
	// Assigns to a group
		public function assignGroup($values){
			$LoginID=$values['LoginID'];	
			if(!empty($values)){
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				//  -- Check that user is faculty
				$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
				$getRole = mysqli_query($con, $checkrole);
				if (mysqli_num_rows($getRole) > 0){
					while($row = mysqli_fetch_array($getRole)){
						$myRole = $row['Role'];
						if ($myRole == 'Faculty'){
							// -- Create New Class Assignment
							$sql = "INSERT INTO group_assign(GroupID, LoginID) VALUES (?,?);";
								$stmt = $con->prepare($sql);
								$stmt->bind_param("si", $values['GroupID'], $values['Subj']);
								$stmt->execute();
								$stmt->close();
						}
						else{ 
							echo "Only faculty can add people to groups. <br/> Please Login."; 
						}
					}
				}
			}
			else{ 
				echo "Only faculty can add people to groups. <br/> Please Login."; 
			}
		}		
//-- Read
	//Lists All Students Assigned to a Group
		public function listGroupStuds($GroupID){
			if(!empty($GroupID)){
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				// ++++ change added group info to class_page. Updated query for group assigned 9/5 KM++++
				$sql = "SELECT login.LoginID, class.ClassID, class.ClassNO, class.ClassName, login.LName, login.FName, login.Email, cgroup.GroupName, cgroup.GroupID
					FROM(((class
					INNER JOIN cgroup ON class.ClassID=cgroup.ClassID)
					INNER JOIN group_assign ON cgroup.GroupID=group_assign.GroupID)
					INNER JOIN login ON group_assign.LoginID=login.LoginID)
					WHERE login.Role = 'Student' && group_assign.GroupID='$GroupID' 
					ORDER BY login.LName";
				// ++++ Change: Added table order to query 9/6 KM ++++
				$getGroups = mysqli_query($con, $sql);
				//output data of each row
				$all_rows = array();
				while($row = mysqli_fetch_array($getGroups)){
					$all_rows[]=$row;
				}
				return $all_rows;
			}
		}
	//Lists all groups or groups by selected class for a student	
	public function groupsByLogin($LoginID, $ClassID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			if($ClassID == 'all'){
				$sql = "SELECT cgroup.GroupName, cgroup.GroupID
					FROM ((cgroup
					INNER JOIN group_assign ON cgroup.GroupID=group_assign.GroupID)
					INNER JOIN login ON group_assign.LoginID = login.LoginID)
					WHERE login.Role = 'Student' && login.LoginID='$LoginID'
					ORDER BY cgroup.GroupID";
			}
			if($ClassID != 'all'){
			//Load by LoginID
			$sql = "SELECT cgroup.GroupName, cgroup.GroupID, login.LoginID, cgroup.ClassID
				FROM ((cgroup
				INNER JOIN group_assign ON cgroup.GroupID=group_assign.GroupID)
				INNER JOIN login ON group_assign.LoginID = login.LoginID)
				WHERE login.Role = 'Student' && login.LoginID='$LoginID'&& cgroup.ClassID='$ClassID'
				ORDER BY cgroup.GroupName";
			}
			// ++++ Change: Added table order to query 9/6 KM ++++			
			$getGroups = mysqli_query($con, $sql); 
			// output data of each row
			$all_rows = array();
			while($row = mysqli_fetch_array($getGroups)){
				$all_rows[]=$row;
			}
			return $all_rows; 
		}
	}
// -- Delete
	// ++++Change: Added deleteGroup 9/7 KM +++
	public function delGroupA($values){
		if(!empty($values)){
			$LoginID = $values['LoginID'];
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			// -- Check that user is faculty
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole);
			if (mysqli_num_rows($getRole) > 0){
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty'){
						// -- Delete Class
						$sql = "DELETE FROM group_assign WHERE GroupID = ? && LoginID = ?;";
							$stmt = $con->prepare($sql);
							$stmt->bind_param("ii", $values['GroupID'], $values['Subj']);
							$stmt->execute();
							$stmt->close();
					}
					else{ 
						echo "There was an error.";	
					}
				}
			}
		}
		else{ 
			echo "Only faculty can delete people from groups. <br/> Please Login."; 
		}
	}
}
?>