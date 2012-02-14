<?php

require_once './lib/DB/LoginDao.php';

class Client{

	private $clientId;
	private $login;
	private $name;
	private $email;
	private $phone;
	private $address;

	public function __construct($clientId, $login, $name, $email, $phone, $address){

		$this->clientId = $clientId;

		if($login instanceof Login){
			$this->login = $login;
		}
		else{
			$this->login = LoginDao::getLoginById($login);
		}

		$this->name = $name;
		$this->email = $email;
		$this->phone = $phone;
		$this->address = $address;

	}

	public function getID(){

		return $this->clientId;

	}

	public function setID($id){

		$this->clientId = $id;

	}

	public function getLogin(){

		return $this->login;

	}

	public function setLogin($login){

		$this->login = $login;

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

	public function getAddress(){

		return $this->address;

	}

	public function setAddress($address){

		$this->address = $address;

	}
	
	public function generateTableCellHTMLWithEmail(){
	
		return "<a href=\"mailto:".$this->getEmail()."\" class=\"info\" title=\"".$this->getEmail()."\">".$this->getName()."</a>";
	
	}

}

?>