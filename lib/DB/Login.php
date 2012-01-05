<?php

class Login{

	public $ID;
	public $username;
	public $encPassword;
	public $type;

	public function __construct($ID, $username, $encPassword, $type){
	
		$this->ID = $ID;
		$this->username = $username;
		$this->encPassword = $encPassword;
		$this->type = $type;
	
	}
	
	
	public function getID(){
	
		return $this->ID;
	
	}
	
	public function setID($ID){
	
		$this->ID = $ID;
	
	}
	
	public function getUsername(){
	
		return $this->username;
	
	}
	
	public function setUsername($username){
	
		$this->username = $username;
	
	}
	
	public function getEncryptedPassword(){
	
		return $this->encPassword;
	
	}
	
	public function setEncryptedPassword($encPassword){
	
		$this->encPassword = $encPassword;
	
	}
	
	public function getType(){
	
		return $this->type;
	
	}
	
	public function setType($type){
	
		$this->type = $type;
	
	}
	
}

?>