<?php

//Change: Added indentation 10/8 KM ++++
class Survey{
	private $LoginID;//User
	private $GSurveyID;
	private $GSurveyName;
	private $QuestionNum;	
	private $QuestionTxt;  
	private $QuestionID;
	private $GroupID;
	private $do;

	public function __get($property){
		if(property_exists($this, $property)){
		return $this->$property;
	}}

	public function __construct($arr){
	if(isset($arr['LoginID'])){
		$this->LoginID = $arr['LoginID'];
		$this->GSurveyID = $arr['GSurveyID'];
		$this->GSurveyName= $arr['GSurveyName'];
		$this->QuestionNum = $arr['QuestionNum'];
		$this->QuestionTxt = $arr['QuestionTxt'];
		$this->QuestionID = $arr['QuestionID'];	  
		$this->GroupID = $arr['GroupID'];
		$this->do = new Survey_DO();
	}}

	private function all_params(){
		$params = array(
		'LoginID' => $this->LoginID,
		'GSurveyID' => $this->GSurveyID,
		'GSurveyName' => $this->GSurveyName,
		'QuestionNum' => $this->QuestionNum,
		'QuestionTxt' => $this-> QuestionTxt,
		'QuestionID' => $this->QuestionID,
		'GroupID' => $this->GroupID
	);
	return $params;
	}

	public function addGroupSurvey(){
		return $this->do->addGroupSurvey($this->all_params());
	}

}
 ?>