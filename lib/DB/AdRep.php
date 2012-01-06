<?php

class AdRep{

	private $repID;
	private $name;
	private $email;
	private $phone;
	
	public function __construct($ID, $name, $email, $phone){
		$this->repID = $ID;
		$this->name = $name;
		$this->email = $email;
		$this->phone = $phone;
	}
	
	public function getID(){
	
		return $this->repID;
	
	}
	
	public function setID($ID){
	
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
	
	public function getPhone(){
	
		return $this->phone;
	
	}
	
	public function setPhone($phone){
	
		$this->phone = $phone;
	
	}
	
	public function generateTableCellHTMLWithEmail(){
	
		return "<a href=\"mailto:".$this->getEmail()."\" class=\"info\" title=\"".$this->getEmail()."\">".$this->getName()."</a>";
	
	}
	
	public function generateTableCellHTMLWithOutEmail(){
	
		return $this->getName();
	
	}

}

?>