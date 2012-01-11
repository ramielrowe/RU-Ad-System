<?php

require_once './lib/DB/Database.php';
require_once './lib/DB/InsertStatus.php';

class InsertStatusDao{

	public static function getAll(){
		
		$statuses = array();
		
		$result = Database::doQuery("SELECT * FROM ".Database::addPrefix('insertstatus')."");
		
		while($row = mysql_fetch_assoc($result)){
			$statuses[] = new InsertStatus($row['StatusID'], $row['Name'], $row['Description']);
		}
		
		return $statuses;
		
	}
	
	public static function getByID($ID){
		
		$row = mysql_fetch_assoc(Database::doQuery("SELECT * FROM ".Database::addPrefix('insertstatus')." WHERE StatusID = '".$ID."'"));
		
		return new InsertStatus($row['StatusID'], $row['Name'], $row['Description']);
		
	}
	
	public static function getRecieved(){
		$result = mysql_fetch_assoc(Database::doQuery("SELECT * FROM ".Database::addPrefix('insertstatus')." WHERE Name = 'Recieved'"));
		return new InsertStatus($result['StatusID'], $result['Name'], $result['Description']);
	}

}

?>