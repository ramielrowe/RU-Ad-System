<?php

require_once 'Database.php';
require_once 'AdRep.php';
require_once 'Login.php';

class AdRepDao{

	public static function getAdRepByLogin($login){
	
		$query = "SELECT * FROM ".Database::addPrefix('adreps')." WHERE LoginID = '".Database::makeStringSafe($login->ID)."'";
	
		$result = Database::doQuery($query);
	
		$adrep = mysql_fetch_assoc($result);
		
		return new AdRep($adrep['AdRepID'],$adrep['Name'],$adrep['Email'],$adrep['Phone']);
	
	}

}

?>