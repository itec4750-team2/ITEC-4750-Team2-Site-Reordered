<?php

include("../_php/config.php");
// $root = realpath($_SERVER["DOCUMENT_ROOT"]);
// include("$root/_php/config.php");

class Students{
private $StID;  
private $Email;
private $Pword;
private $Role;
private $FName;
private $LName; 
private $do;

public function __get($property){
	if(property_exists($this, $property)){
	return $this->$property;
}}

public function __construct($arr){
if(isset($arr["StID"])){
	$this->StID = $arr["StID"];	  
	$this->Email = $arr["Email"];
	$this->Pword = $arr["Pword"];
	$this->Role = $arr["Role"];
	$this->FName = $arr["FName"];
	$this->LName= $arr['LName'];
	$this->do = new Class_DO();
}}

private function all_params(){
	$params = array(
	"StID" => $this->StID,
	"Email" => $this->Email,
	"Pword" => $this->Pword,
	"Role" => $this->Role,
	"FName" => $this->FName,
	"LName" => $this->LName
);
return $params;
}
private function idOnly(){
	$params = array(
	"StID" => $this->StID,
);
return $params;
}

public function createClass(){
	return $this->do->createClass($this->all_params());
}

public function updateClass(){
	$r = $this->do->updateClass($this->StID, $this->all_params());
	return $r;
}

public function deleteClass(){
	return $this->do->deleteClass($this->idOnly());
}

}
 ?>