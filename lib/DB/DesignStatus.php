<?php

require_once 'lib/DB/DesignStatusDao.php';

class DesignStatus {
	
	private $ID;
	private $name;
	private $description;
	
	public function __construct($id, $name, $desc){
		
		$this->ID = $id;
		$this->name = $name;
		$this->description = $desc;
		
	}
	
	public function getID(){
		
		return $this->ID;
		
	}
	
	public function setID($id){
		
		$this->ID = $id;
		
	}
	
	public function getName(){
		
		return $this->name;
		
	}
	
	public function setName($name){
		
		$this->name = $name;
		
	}
	
	public function getDescription(){
		
		return $this->description;
		
	}
	
	public function setDescription($desc){
		
		$this->description = $desc;
		
	}
	
	public function toOptionHTML(){
		
		return "<option value=\"".$this->getName()."\">".$this->getName()."</option>";
		
	}
	
	public static function generateSelect(){
		
		$statuses = DesignStatusDao::getAll();
		
		$html = "<select name=\"designstatus\">";
		
		foreach($statuses as $status){
			$html = $html . $status->toOptionHTML();
		}
		
		$html = $html . "</select>";
		
		return $html;
		
	}

}

?>