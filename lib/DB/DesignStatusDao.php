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

}

?>