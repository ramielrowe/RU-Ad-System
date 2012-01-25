<?php

require_once './lib/DB/IssueDao.php';

class Issue {

	private $ID;
	private $issueDate;
	
	public function __construct($id, $issueDate){
		
		$this->ID = $id;
		$this->issueDate = $issueDate;
		
	}
	
	public function getID(){
		
		return $this->ID;
		
	}
	
	public function setID($id){
		
		$this->ID = $id;
		
	}
	
	public function getIssueDate(){
		
		return $this->issueDate;
		
	}
	
	public function setIssueDate($issueDate){
		
		$this->issueDate = $issueDate;
		
	}
	
	public function toOptionHTML(){
		return "<option value=\"".$this->issueDate."\">".$this->issueDate."</option>";
	}
	
	public static function generateInsertDateSelect(){
		
		$issues = IssueDao::getIssuesAfterCurrentDate();
		
		$select = "<select name=\"insertdate\" class=\"bluefocus normalsize\">";
		
		foreach($issues as $issue){
			$select = $select . $issue->toOptionHTML();
		}
		
		$select = $select . "</select>";
		
		return $select;
	}

}

?>