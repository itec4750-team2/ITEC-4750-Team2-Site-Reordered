<?php

include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');

class Profile{
private $LoginID;
private $Role;
private $Password;	
private $Subj;  
private $Email;
private $FName;
private $LName; 
private $do;

public function __get($property){
	if(property_exists($this, $property)){
	return $this->$property;
}}

public function __construct($arr){
if(isset($arr['LoginID'])){
	$this->LoginID = $arr['LoginID'];
	$this->Role = $arr['Role'];
	$this->Password = $arr['Password'];
	$this->Subj = $arr['Subj'];	  
	$this->Email = $arr['Email'];
	$this->FName = $arr['FName'];
	$this->LName = $arr['LName'];
	$this->do = new Profile_DO();
}}

private function all_params(){
	$params = array(
	'LoginID' => $this->LoginID,
	'Role' => $this->Role,
	'Password' => $this->Password,
	'Subj' => $this->Subj,
	'Email' => $this->Email,
	'FName' => $this->FName,
	'LName' => $this->LName
);
return $params;
}

public function updateProfile(){
	$r = $this->do->updateProfile($this->all_params());
	return $r;
}

public function deleteStudent(){
	return $this->do->deleteStudent($this->all_params());
}

public function addProfile(){
	return $this->do->addProfile($this->all_params());
}
}
 ?>