<?php

class BillingStatus {
	
	const PAID = "Paid";
	const UNPAID = "Unpaid";
	
	private $name;
	private $description;
	
	public function __construct($name, $desc){
		
		$this->name = $name;
		$this->description = $desc;
		
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
	
	public function generateTableCellHTML(){
	
		return "<a href=\"#\" title=\"".$this->getDescription()."\" class=\"info\">".$this->getName()."</a>";
	
	}
	
	public function toOptionHTML(){
		
		return "<option value=\"".$this->getName()."\">".$this->getName()."</option>";
		
	}
	
	public static function generateSelect(){
		
		$statuses = array(0 => BillingStatus::paidStatus(), 1 => BillingStatus::toOptionHTML());
		
		$html = "<select name=\"billingstatus\">";
		
		foreach($statuses as $status){
			$html = $html . $status->toOptionHTML();
		}
		
		$html = $html . "</select>";
		
		return $html;
		
	}
	
	public static function getStatusForName($name){
		
		if($name == BillingStatus::PAID){
			return BillingStatus::paidStatus();
		}else if($name == BillingStatus::UNPAID){
			return BillingStatus::unpaidStatus();
		}else{
			return BillingStatus::unknownStatus();
		}
		
	}
	
	public static function paidStatus(){
		
		return new BillingStatus("Paid", "Payment has been recieved.");
		
	}
	
	public static function unpaidStatus(){
		
		return new BillingStatus("Unpaid", "Payment has yet to be recieved.");
		
	}
	
	public static function unknownStatus(){
		return new BillingStatus("Unknown", "There was an error retriving billing status.");
	}
	
}

?>