<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');

class Group_Assign{
	private $Subj; //Student or Faculty
	private $LoginID; // User
	private $GroupID;
	private $do;

	public function __get($property){
		if(property_exists($this, $property)){
			return $this->$property;
		}
	}

	public function __construct($arr){
		if(isset($arr["Subj"])){
			$this->Subj = $arr["Subj"];	// Student or Faculty
			$this->LoginID = $arr["LoginID"]; // User
			$this->GroupID = $arr["GroupID"];
			$this->do = new GA_DO();
		}
	}

	private function all_params(){
		$params = array(
		"Subj" => $this->Subj, // Student or Faculty
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