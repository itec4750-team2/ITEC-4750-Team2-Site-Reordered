<?php

class Class_DO{

// -- Create
	public function createClass($values){
	if(!empty($values)){
	$LoginID = $values['LoginID'];
	include("../_php/config.php");
//  -- Check that user is faculty
	$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
	$getRole = mysqli_query($con, $checkrole);
	if (mysqli_num_rows($getRole) > 0) {
		while($row = mysqli_fetch_array($getRole)) {
			$myRole = $row['Role'];
			if ($myRole == 'Faculty'){
// -- Create Class
				$sql = "INSERT INTO class (ClassID, ClassNO, ClassName, ExpDate, SemesterID) VALUES (?,?,?,?,?);";
				$stmt = $con->prepare($sql);
				$stmt->bind_param("isssi", $values["ClassID"], $values["ClassNO"],
				$values["ClassName"], $values["ExpDate"], $values["SemesterID"]);
				//return $this->commit($stmt);
				$stmt->execute();
				$stmt->close();
				
				//Instructor Creating Class is assigned to it.
				$sql2 = "INSERT INTO class_Assign (ClassID, LoginID) VALUES (?,?);";
				$stmt2 = $con->prepare($sql2);
				$stmt2->bind_param("ii", $values["ClassID"], $values["LoginID"]);
				//return $this->commit($stmt);
				$stmt2->execute();
				$stmt2->close();		
				
				echo "<div><br/> Success! <br/></div>"; 
				}else{ echo "Only faculty can add classes. /n Please Login."; }}}}
				 else{ echo "Only faculty can add classes. \n Please Login."; }}

// -- Read All
	public function loadAll($LoginID){
	if(!empty($LoginID)){
	include("../_php/config.php");
//  -- Check that user is faculty
	$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
	$getRole = mysqli_query($con, $checkrole);
	if (mysqli_num_rows($getRole) > 0) {
		while($row = mysqli_fetch_array($getRole)) {
			$myRole = $row['Role'];
			if ($myRole == 'Faculty'){
// -- Load All Classes		
			$sql = "SELECT class.ClassID, ClassNO, ClassName, ExpDate, class.SemesterID, SemesterName, Year
				FROM(class
				INNER JOIN semester ON semester.SemesterID=class.SemesterID)";
			$getClass = mysqli_query($con, $sql); 

			// output data of each row
			$all_rows = array();
			while($row = mysqli_fetch_array($getClass)){$all_rows[]=$row;}
			return $all_rows;
			}else { echo "Only faculty can add classes. /n Please Login."; }}}}
			 else { echo "Only faculty can add classes. \n Please Login."; }}

// -- Read Owned
public function loadByLoginID($LoginID){
		if(!empty($LoginID)){
		include("../_php/config.php");
//Load by LoginID
		$sql = "SELECT class.ClassID, ClassNO, ClassName, ExpDate, class.SemesterID, SemesterName, Year
			FROM((class
			INNER JOIN class_assign ON class.ClassID=class_assign.ClassID)
			INNER JOIN semester ON semester.SemesterID=class.SemesterID)
			WHERE class_assign.LoginID = '$LoginID'&& DATEDIFF(ExpDate, NOW())>0";
		$getClass = mysqli_query($con, $sql); 

		// output data of each row
		$all_rows = array();
		while($row = mysqli_fetch_array($getClass)){$all_rows[]=$row;}
		return $all_rows; }}
	

// -- Class Info Page -- Update and Delete Accessible
		public function classPage($ClassID){
		if(!empty($ClassID)){	
		include("../_php/config.php");

		$sql = "SELECT class.ClassID, ClassNO, ClassName, ExpDate, class.SemesterID, SemesterName, Year
			FROM(class
			INNER JOIN semester ON semester.SemesterID=class.SemesterID)
			WHERE class.ClassID = '$ClassID'";
		$getClass = mysqli_query($con, $sql); 

		// output data of each row
		$all_rows = array();
		while($row = mysqli_fetch_array($getClass)){$all_rows[]=$row;}
		return $all_rows; }}

// -- Update
		public function updateClass($ClassID, $values){
		if(!empty($values)){
		$LoginID = $values['LoginID'];
		include("../_php/config.php");
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
			//return $this->commit($stmt);
			$stmt->execute();
			$stmt->close();
			echo "You updated Item #". $values["ClassID"];}
		else{ echo "There was an error."; }}}}
		else{ echo "Only faculty can add classes. \n Please Login."; }}

// -- Delete

public function deleteClass($values){
		if(!empty($values)){
		$LoginID = $values['LoginID'];
		include("../_php/config.php");
// -- Check that user is faculty
		$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
		$getRole = mysqli_query($con, $checkrole);
		if (mysqli_num_rows($getRole) > 0) {
			while($row = mysqli_fetch_array($getRole)) {
				$myRole = $row['Role'];
				if ($myRole == 'Faculty'){
// -- Delete Class
					$sql = "DELETE FROM class WHERE ClassID = ?;";
					$stmt = $con->prepare($sql);
					$stmt->bind_param("i", $values["ClassID"]);
					//return $this->commit($stmt);
					$stmt->execute();
					$stmt->close();
					echo "You Deleted Item #". $values["ClassID"];
		} else{ echo "There was an error.";	}}}}
		else{ echo "Only faculty can add classes. \n Please Login."; }}}
?>