<?php

class Status{

	private $statusID;
	private $status;
	private $description;
	
	public function __construct($ID, $status, $description){
		$this->statusID = $ID;
		$this->status = $status;
		$this->description = $description;
	}
	
	public function getStatusID(){
	
		return $this->statusID;
	
	}
	
	public function setStatusID($ID){
	
		$this->statusID = $ID;
	
	}
	
	public function getStatus(){
	
		return $this->status;
	
	}
	
	public function setStatus($status){
	
		$this->status = $status;
	
	}
	
	public function getDescription(){
	
		return $this->description;
	
	}
	
	public function setDescription($description){
	
		$this->description = $description;
	
	}
	
	public function generateTableCellHTML(){
	
		return "<a href=\"#\" title=\"".$this->getDescription()."\" class=\"info\">".$this->getStatus()."</a>";
	
	}

}

?>