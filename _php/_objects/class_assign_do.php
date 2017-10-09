<?php
class CA_DO{
	// ++++ Change: Adjusted indentation 9/8 KM ++++
	
// -- Create
	// ++++ Change: Added assignClass 9/7 KM ++++
	// Assigns to a class
		public function assignClass($values){
			$LoginID=$values['LoginID'];	
			if(!empty($values)){
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				//  -- Check that user is faculty
				$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
				$getRole = mysqli_query($con, $checkrole);
				if (mysqli_num_rows($getRole) > 0) {
					while($row = mysqli_fetch_array($getRole)) {
						$myRole = $row['Role'];
						if ($myRole == 'Faculty'){
							// -- Create New Class Assignment
							$sql = "INSERT INTO class_assign(ClassID, LoginID) VALUES (?,?);";
								$stmt = $con->prepare($sql);
								$stmt->bind_param("ii", $values['ClassID'], $values['Subj']);
								$stmt->execute();
								$stmt->close();
						}
						else{ 
							echo "Only faculty can add classes. \n Please Login."; 
							}
					}
				}
			}
			else{
				echo "Only faculty can add classes. \n Please Login."; 
				}
		}

// -- Read
	// ++++ Change: Moved to class_assign_do from stu_do 9/5 KM ++++
	//Lists All Students assigned to a class
		public function listClassStuds($ClassID){			
			if(!empty($ClassID)){

				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				$sql = "SELECT login.LoginID, class.ClassID, class.ClassNO, class.ClassName, login.LName, login.FName, login.Email
					FROM((class
					INNER JOIN class_assign ON class_assign.ClassID=class.ClassID)
					INNER JOIN login ON class_assign.LoginID=login.LoginID)
					WHERE login.Role = 'Student' && class.ClassID='$ClassID'	
					ORDER BY login.LName ASC";			
				// ++++ Change: Added table order to query 9/7 KM ++++				
				$getClasses = mysqli_query($con, $sql);
				//output data of each row
				$all_rows = array();
				while($row = mysqli_fetch_array($getClasses)){
					$all_rows[]=$row;
				}
				return $all_rows;
			}
		}
		
	// ++++ Change: Added Instructor list 9/8 KM ++++			
	//Lists Instructors assigned to a class
		public function listClassInstrs($ClassID){
			if(!empty($ClassID)){
				include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
				$sql = "SELECT login.LoginID, class.ClassID, class.ClassNO, class.ClassName, login.LName, login.FName, login.Email
					FROM((class
					INNER JOIN class_assign ON class.ClassID=class_assign.ClassID)
					INNER JOIN login ON class_assign.LoginID=login.LoginID)
					WHERE login.Role = 'Faculty' && class.ClassID='$ClassID'";					
				$getClasses = mysqli_query($con, $sql);	
				//output data of each row
				$all_facs = array();
				while($fac = mysqli_fetch_array($getClasses)){
					$all_facs[]=$fac;
				}
				return $all_facs;
			}
		}		

/* -- Update
	Delete old instructor assignment & create a new assignment
	*/

// -- Delete
	// ++++ Change: Added deleteClass on student_mgt_pg.php 9/7 KM +++
		public function delClassA($values){
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
							$sql = "DELETE FROM class_assign WHERE ClassID = ? && LoginID = ?;";
								$stmt = $con->prepare($sql);
								$stmt->bind_param("ii", $values['ClassID'], $values['Subj']);
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
				echo "Only faculty can add classes. \n Please Login."; 
				}
		}
}
?>