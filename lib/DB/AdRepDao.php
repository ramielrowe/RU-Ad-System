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
	public static function getAdRepByID($ID){
	
		$query = "SELECT * FROM ".Database::addPrefix('adreps')." WHERE AdRepID = '".Database::makeStringSafe($ID)."'";
	
		$result = Database::doQuery($query);
	
		$adrep = mysql_fetch_assoc($result);
		
		return new AdRep($adrep['AdRepID'],$adrep['Name'],$adrep['Email'],$adrep['Phone']);
	
	}
	
	public static function updateAdRep($adRep, $name, $email, $phone){
	
		if($adRep instanceof AdRep){
	
			$query = "UPDATE ".Database::addPrefix('adreps')."
					SET name = '".$name."', email = '".$email."',
					phone = '".$phone."'
				 	WHERE AdRepID = '".Database::makeStringSafe($adRep->getID())."' LIMIT 1";
	
			Database::doQuery($query);
	
			return AdRepDao::getAdRepByID($adRep->getID());
	
		}else{
			$query = "UPDATE ".Database::addPrefix('clients')."
								SET name = '".$name."', email = '".$email."',
								phone = '".$phone."', address = '".$address."'
							 	WHERE AdRepID = '".Database::makeStringSafe($client)."' LIMIT 1";
	
			Database::doQuery($query);
	
			return AdRepDao::getAdRepByID($adRep);
		}
	
	}

}

?>