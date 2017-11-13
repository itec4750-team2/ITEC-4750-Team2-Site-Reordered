<?php

//Change: Added indentation 10/8 KM ++++
class Responses{
	private $LoginID;//User
	private $Subj;//TeamMember
	private $GSurveyID;	
	private $QuestionID;  
	private $ResponseValue;
	private $GroupID;
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
		$this->QuestionID = $arr['QuestionID'];	  
		$this->ResponseValue = $arr['ResponseValue'];
		$this->GroupID = $arr['GroupID'];
		$this->do = new Survey_DO();
	}}

	private function all_params(){
		$params = array(
		'LoginID' => $this->LoginID,
		'Subj' => $this->Subj,
		'GSurveyID' => $this->GSurveyID,
		'QuestionID' => $this->QuestionID,
		'ResponseValue' => $this->ResponseValue,
		'GroupID' => $this->GroupID
	);
	return $params;
	}
	public function addSurvey(){
		return $this->do->addSurvey($this->all_params());
	}

}
 ?>