<?php

class Class_DO{

//Create Functions
public function createClass($values){
$LoginID = $values['LoginID'];
include("../_php/config.php");
//    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
//    include("$root/_php/config.php");
$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
$getRole = mysqli_query($con, $checkrole);
if (mysqli_num_rows($getRole) > 0) {
	while($row = mysqli_fetch_array($getRole)) {
		$myRole = $row['Role'];
		if ($myRole == 'Faculty'){
			$sql = "INSERT INTO class (ClassID, ClassNO, ClassName, ExpDate, SemesterID) VALUES (?,?,?,?,?);";
			$stmt = $con->prepare($sql);
			$stmt->bind_param("isssi", $values["ClassID"], $values["ClassNO"],
			$values["ClassName"], $values["ExpDate"], $values["SemesterID"]);
			//return $this->commit($stmt);
			$stmt->execute();
			$stmt->close();
			header("Location: ../_facultyPages/facultyDashboard.php");
			}
		else{
			echo "Only faculty can add classes. /n Please Login.";
			}
	}
}
else{
	echo "Only faculty can add classes. \n Please Login.";
	}
}

//Read Functions
public function loadAll($LoginID){
	include("../_php/config.php");
//    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
//    include("$root/_php/config.php");

include("../_php/config.php");
//    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
//    include("$root/_php/config.php");
$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
$getRole = mysqli_query($con, $checkrole);
if (mysqli_num_rows($getRole) > 0) {
	while($row = mysqli_fetch_array($getRole)) {
		$myRole = $row['Role'];
		if ($myRole == 'Faculty'){
		$sql = "SELECT class.ClassID, ClassNO, ClassName, ExpDate, class.SemesterID, SemesterName, Year
			FROM(class
			INNER JOIN semester ON semester.SemesterID=class.SemesterID)";
		$getClass = mysqli_query($con, $sql); 

		// output data of each row
		$all_rows = array();
		while($row = mysqli_fetch_array($getClass)){$all_rows[]=$row;}
		return $all_rows;
		}
		else{
			echo "Only faculty can add classes. /n Please Login.";
			}
	}
}
else{
	echo "Only faculty can add classes. \n Please Login.";
	}
}

public function loadByLoginID($LoginID){
	
include("../_php/config.php");
//    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
//    include("$root/_php/config.php");

$sql = "SELECT LoginID, class.ClassID, ClassNO, ClassName, ExpDate, class.SemesterID, SemesterName, Year
	FROM((class
	INNER JOIN class_assign ON class.ClassID=class_assign.ClassID)
	INNER JOIN semester ON semester.SemesterID=class.SemesterID)
	WHERE LoginID = '$LoginID'&& DATEDIFF(ExpDate, NOW())>0";
$getClass = mysqli_query($con, $sql); 

// output data of each row
$all_rows = array();
while($row = mysqli_fetch_array($getClass)){$all_rows[]=$row;}
	return $all_rows;
}

public function classPage($ClassID){
include("../_php/config.php");
//    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
//    include("$root/_php/config.php");
$sql = "SELECT class.ClassID, ClassNO, ClassName, ExpDate, class.SemesterID, SemesterName, Year
	FROM(class
	INNER JOIN semester ON semester.SemesterID=class.SemesterID)
	WHERE class.ClassID = '$ClassID'";
$getClass = mysqli_query($con, $sql); 

// output data of each row
$all_rows = array();
while($row = mysqli_fetch_array($getClass)){$all_rows[]=$row;}
	return $all_rows;
}	

//Update Functions
public function updateClass($ClassID, $values){
$LoginID = $values['LoginID'];
include("../_php/config.php");
//    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
//    include("$root/_php/config.php");
$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
$getRole = mysqli_query($con, $checkrole);
if (mysqli_num_rows($getRole) > 0) {
while($row = mysqli_fetch_array($getRole)) {
	$myRole = $row['Role'];
	if ($myRole == 'Faculty'){
		$sql = "UPDATE class SET ClassNO =?, ClassName = ?, ExpDate=?, SemesterID=?	WHERE ClassID = ?;";
			$stmt = $con->prepare($sql);
			$stmt->bind_param("sssii",  $values["ClassNO"],
			$values["ClassName"], $values["ExpDate"], $values["SemesterID"], $values["ClassID"]);
		//return $this->commit($stmt);
		$stmt->execute();
		$stmt->close();
		echo "You updated Item #". $values["ClassID"];
		}
	else{
		echo "There was an error.";
		}
	}
}
else{
	echo "Only faculty can add classes. \n Please Login.";
	}
}

//Delete Functions

public function deleteClass($values){
$LoginID = $values['LoginID'];
include("../_php/config.php");
//    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
//    include("$root/_php/config.php");
$checkrole = "SELECT Role From login WHERE LoginID = '$LoginID'";			
$getRole = mysqli_query($con, $checkrole);
if (mysqli_num_rows($getRole) > 0) {
	while($row = mysqli_fetch_array($getRole)) {
		$myRole = $row['Role'];
		if ($myRole == 'Faculty'){
			$sql = "DELETE FROM class WHERE ClassID = ?;";
			$stmt = $con->prepare($sql);
			$stmt->bind_param("i", $values["ClassID"]);
			//return $this->commit($stmt);
			$stmt->execute();
			$stmt->close();
			echo "You Deleted Item #". $values["ClassID"];
			}
		else{
			echo "There was an error.";
			}
	}
}
else{
	echo "Only faculty can add classes. \n Please Login.";
	}
}
}
?>