<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
include("../_php/config.php");

class Group_Assign{
	private $StID; //Student
	private $LoginID; // User
	private $GroupID;
	private $do;

	public function __get($property){
		if(property_exists($this, $property)){
			return $this->$property;
		}
	}

	public function __construct($arr){
		if(isset($arr["StID"])){
			$this->StID = $arr["StID"];	// Student
			$this->LoginID = $arr["LoginID"]; // User
			$this->GroupID = $arr["GroupID"];
			$this->do = new GA_DO();
		}
	}

	private function all_params(){
		$params = array(
		"StID" => $this->StID, // Student
		"LoginID" => $this->LoginID, // User
		"GroupID" => $this->GroupID);
		return $params;
	}

	public function assignGroup(){
		return $this->do->assignGroup($this->all_params());
	}

	public function delGroupA(){
		return $this->do->delGroupA($this->all_params());
	}
}
 ?>