<?php

class AdRep{

	private $repID;
	private $name;
	private $email;
	
	public function __construct($ID, $name, $email){
		$this->repID = $ID;
		$this->name = $name;
		$this->email = $email;
	}
	
	public function getRepID(){
	
		return $this->repID;
	
	}
	
	public function setRepID($ID){
	
		$this->repID = $ID;
	
	}
	
	public function getName(){
	
		return $this->name;
	
	}
	
	public function setName($name){
	
		$this->name = $name;
	
	}
	
	public function getEmail(){
	
		return $this->email;
	
	}
	
	public function setEmail($email){
	
		$this->email = $email;
	
	}
	
	public function generateTableCellHTMLWithEmail(){
	
		return "<a href=\"mailto:".$this->getEmail()."\" class=\"info\" title=\"".$this->getEmail()."\">".$this->getName()."</a>";
	
	}

}

?>