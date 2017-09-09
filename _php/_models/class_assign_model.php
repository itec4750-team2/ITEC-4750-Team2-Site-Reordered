<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
	include("../_php/config.php");

	class Class_Assign{
		private $LoginID; // User	
		private $Subj; // Student or Faculty Assign
		private $ClassID;
		private $do;

		public function __get($property){
			if(property_exists($this, $property)){
				return $this->$property;
			}
		}

		public function __construct($arr){
			if(isset($arr['LoginID'])){
				$this->LoginID = $arr['LoginID']; // User
				$this->Subj = $arr['Subj'];	// Student or Faculty Assign
				$this->ClassID = $arr['ClassID'];
				$this->do = new CA_DO();
			}
		}

		private function all_params(){
			$params = array(
			'LoginID' => $this->LoginID, // User
			'Subj' => $this->Subj, // Student or Faculty Assign
			'ClassID' => $this->ClassID);
			return $params;
		}

		public function assignClass(){
			return $this->do->assignClass($this->all_params());
		}

		public function delClassA(){
			return $this->do->delClassA($this->all_params());
		}
	}
 ?>