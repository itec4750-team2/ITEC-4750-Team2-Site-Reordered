<?php

//Change: Added indentation 10/8 KM ++++
class Survey{
	private $LoginID;//User
	private $Subj;//TeamMember
	private $GSurveyID;	
	private $GroupQID;  
	private $ResponseValue;
	private $GroupID;
	private $Taken; 
	private $iRound;
	private $do;

	public function __get($property){
		if(property_exists($this, $property)){
		return $this->$property;
	}}

	public function __construct($arr){
	if(isset($arr['LoginID'])){
		$this->LoginID = $arr['LoginID'];
		$this->Subj = $arr['Subj'];
		$this->GSurveyID = $arr['GSurveyID'];
		$this->GroupQID = $arr['GroupQID'];	  
		$this->ResponseValue = $arr['ResponseValue'];
		$this->GroupID = $arr['GroupID'];
		$this->Taken = $arr['Taken'];
		$this->iRound = $arr['Round'];
		$this->do = new Survey_DO();
	}}

	private function all_params(){
		$params = array(
		'LoginID' => $this->LoginID,
		'Subj' => $this->Subj,
		'GSurveyID' => $this->GSurveyID,
		'GroupQID' => $this->GroupQID,
		'ResponseValue' => $this->ResponseValue,
		'GroupID' => $this->GroupID,
		'Taken' => $this->Taken,
		'iRound' => $this->iRound
	);
	return $params;
	}


	public function addSurvey(){
		return $this->do->addSurvey($this->all_params());
	}

}
 ?>