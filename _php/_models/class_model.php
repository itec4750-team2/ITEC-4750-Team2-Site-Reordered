<?php

include("../_php/config.php");
// $root = realpath($_SERVER["DOCUMENT_ROOT"]);
// include("$root/_php/config.php");

class Classes{
private $LoginID;  
private $ClassID;
private $ClassNO;
private $ClassName;
private $SemesterID;
private $ExpDate; 
//private $SemesterName;
//private $Year;
private $do;

public function __get($property){
	if(property_exists($this, $property)){
	return $this->$property;
}}

public function __construct($arr){
if(isset($arr["LoginID"])){
	$this->LoginID = $arr["LoginID"];	  
	$this->ClassID = $arr["ClassID"];
	$this->ClassNO = $arr["ClassNO"];
	$this->ClassName = $arr["ClassName"];
	$this->SemesterID = $arr["SemesterID"];
	$this->ExpDate= $arr['ExpDate'];
//	$this->SemesterName = $arr['SemesterName'];
//	$this->Year = $arr['Year'];
	$this->do = new Class_DO();
}}

private function all_params(){
	$params = array(
	"LoginID" => $this->LoginID,
	"ClassID" => $this->ClassID,
	"ClassNO" => $this->ClassNO,
	"ClassName" => $this->ClassName,
	"SemesterID" => $this->SemesterID,
	"ExpDate" => $this->ExpDate
);
return $params;
}
private function idOnly(){
	$params = array(
	"LoginID" => $this->LoginID,
	"ClassID" => $this->ClassID
);
return $params;
}

public function createClass(){
	return $this->do->createClass($this->all_params());
}

public function updateClass(){
	$r = $this->do->updateClass($this->ClassID, $this->all_params());
	return $r;
}

public function deleteClass(){
	return $this->do->deleteClass($this->idOnly());
}

}
 ?>