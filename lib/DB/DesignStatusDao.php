<?php

require_once './lib/DB/Database.php';
require_once './lib/DB/DesignStatus.php';

class DesignStatusDao{

	public static function getAll(){
		
		$statuses = array();
		
		$result = Database::doQuery("SELECT * FROM ".Database::addPrefix('designstatus')."");
		
		while($row = mysql_fetch_assoc($result)){
			$statuses[] = new DesignStatus($row['StatusID'], $row['Name'], $row['Description']);
		}
		
		return $statuses;
		
	}
	
	public static function getByID($ID){
		
		$row = mysql_fetch_assoc(Database::doQuery("SELECT * FROM ".Database::addPrefix('designstatus')." WHERE StatusID = '".$ID."'"));
		
		return new DesignStatus($row['StatusID'], $row['Name'], $row['Description']);
		
	}

}

?>