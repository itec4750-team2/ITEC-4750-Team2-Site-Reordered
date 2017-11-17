<?php
// ++++ Change: Added indentation 9/8 KM ++++
class Class_DO{
// -- Create
	// Create Class, verify user is faculty
	public function createClass($values){
		if(!empty($values)){
			$LoginID = $values['LoginID'];
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			//  -- Check that user is faculty
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole);
			if (mysqli_num_rows($getRole) > 0){
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty'){
						// -- Create Class
						$sql = "INSERT INTO class (ClassID, ClassNO, ClassName, ExpDate, SemesterID) VALUES (?,?,?,?,?);";
							$stmt = $con->prepare($sql);
							$stmt->bind_param("isssi", $values["ClassID"], $values["ClassNO"],
							$values["ClassName"], $values["ExpDate"], $values["SemesterID"]);
							$stmt->execute();
							$stmt->close();
						//Instructor Creating Class is assigned to it.
						// ++++ Change: Fixed table name KM 11/16 +++++
						$sql2 = "INSERT INTO class_assign (ClassID, LoginID) VALUES (?,?);";
							$stmt2 = $con->prepare($sql2);
							$stmt2->bind_param("ii", $values["ClassID"], $values["LoginID"]);
							$stmt2->execute();
							$stmt2->close();		 
					}
					else{ 
						echo "Only faculty can add classes. <br/> Please Login."; 
					}
				}
			}
		}
		else{
			echo "Only faculty can add classes. <br/> Please Login."; 
		}
	}
// -- Read 
	// ++++ Change: Verify user is faculty 9/8 KM ++++
	// Load All Classes, verify user is faculty
	public function loadAll($LoginID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			//  -- Check that user is faculty
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole);
			if (mysqli_num_rows($getRole) > 0) {
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty'){
						// -- Load All Classes		
						$sql = "SELECT class.ClassID, ClassNO, ClassName, ExpDate, class.SemesterID, SemesterName, Year
							FROM(class
							INNER JOIN semester ON semester.SemesterID=class.SemesterID)
							WHERE DATEDIFF(ExpDate, NOW())>0
							ORDER BY class.ClassID";//++++ Change: Order by ClassID 11/14 KM++++							
						$getClass = mysqli_query($con, $sql); 
						// output data of each row
						$all_rows = array();
						while($row = mysqli_fetch_array($getClass)){
							$all_rows[]=$row;
						}
						return $all_rows;
					}
					else{ 
						echo "Only faculty can add classes. <br/> Please Login."; 
					}
				}
			}
		}
		else { 
			echo "Only faculty can add classes. <br/> Please Login."; 
		}
	}
	// Load Classes by User LoginID, for faculty or students
	public function loadByLoginID($LoginID){
		if(!empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			//Load by LoginID
			$sql = "SELECT class.ClassID, ClassNO, ClassName, ExpDate, class.SemesterID, SemesterName, Year
				FROM((class
				INNER JOIN class_assign ON class.ClassID=class_assign.ClassID)
				INNER JOIN semester ON semester.SemesterID=class.SemesterID)
				WHERE class_assign.LoginID = '$LoginID'&& DATEDIFF(ExpDate, NOW())>0
				ORDER BY class.ClassID";//++++ Change: Order by ClassID 11/14 KM++++	
			$getClass = mysqli_query($con, $sql); 
			// output data of each row
			$all_rows = array();
			while($row = mysqli_fetch_array($getClass)){
				$all_rows[]=$row;
			}
			return $all_rows; 
		}
		else{
			echo "Please Login";
		}
	}
	// Class Info Page -- Update and Delete Accessible, verify user is faculty
	public function classPage($ClassID, $LoginID){
	if(!empty($ClassID)&& !empty($LoginID)){
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			// -- Check that user is faculty
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole);
			if (mysqli_num_rows($getRole) > 0){
				while($row = mysqli_fetch_array($getRole)){
					$myRole = $row['Role'];
					if ($myRole == 'Faculty'){		
						$sql = "SELECT class.ClassID, class.ClassNO, class.ClassName, class.ExpDate, class.SemesterID, semester.SemesterName, semester.Year
							FROM(class
							INNER JOIN semester ON semester.SemesterID=class.SemesterID)
							WHERE class.ClassID = '$ClassID'";
						$getClass = mysqli_query($con, $sql); 
						// output data of each row
						$all_rows = array();
						while($row = mysqli_fetch_array($getClass)){
							$all_rows[]=$row;
						}
						return $all_rows; 
					}
				}
			}
			else{ 
				echo "Only faculty can add classes. <br/> Please Login."; 
			}
		}
	}
// -- Update
	// Update a class by ClassID, verify user is faculty.
	public function updateClass($ClassID, $values){
		if(!empty($values)){
			$LoginID = $values['LoginID'];
			include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
			// -- Check that user is faculty
			$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
			$getRole = mysqli_query($con, $checkrole);
			if (mysqli_num_rows($getRole) > 0) {
				while($row = mysqli_fetch_array($getRole)) {
					$myRole = $row['Role'];
					if ($myRole == 'Faculty'){
						// --Update Class				
						$sql = "UPDATE class SET ClassNO =?, ClassName=?, ExpDate=?, SemesterID=?	WHERE ClassID=?;";
							$stmt = $con->prepare($sql);
							$stmt->bind_param("sssii",  $values["ClassNO"],
							$values["ClassName"], $values["ExpDate"], $values["SemesterID"], $values["ClassID"]);
							$stmt->execute();
							$stmt->close();
						echo "You updated Item #". $values["ClassID"];
					}
					else{ 
						echo "There was an error."; 
					}
				}
			}
		}
		else{ 
			echo "Only faculty can update classes. <br/> Please Login."; 
		}
	}
// -- Delete
	// Delete class by ClassID, verify user is faculty
	public function deleteClass($values){
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
							$sql = "DELETE FROM class WHERE ClassID = ?;";
								$stmt = $con->prepare($sql);
								$stmt->bind_param("i", $values["ClassID"]);
								$stmt->execute();
						} 
						else{ 
							echo "There was an error.";	
						}
					}
				}
			}
			else{ 
				echo "Only faculty can delete classes. <br/> Please Login."; 
			}
		}
}
?>
