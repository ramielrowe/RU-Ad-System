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
	
	public static function getAdRepsNotAssigned($date){
		
		$query = "SELECT DISTINCT AdRepID FROM ".Database::addPrefix('adreps')." WHERE AdRepID NOT IN (SELECT AdRepID FROM insertionorders WHERE InsertDate = '".Database::makeStringSafe($date)."' and AdRepID != null)";
		
		$result = Database::doQuery($query);
		
		if(mysql_num_rows($result) > 0){
			$adReps = array();
			while($row = mysql_fetch_assoc($result)){
				$adReps[] = AdRepDao::getAdRepByID($row['AdRepID']);
			}
			return $adReps;
		}else{
			return array();
		}
		
	}
	
	public static function getLowestAssignedAdRep($date){
		$query = "SELECT * FROM (SELECT AdRepID, count(AdRepID) as NumInserts FROM ".Database::addPrefix('insertionorders')." WHERE InsertDate = '2012-1-01' GROUP BY AdRepID) t ORDER BY NumInserts ASC LIMIT 1";
		$result = Database::doQuery($query);
		if(mysql_num_rows($result) > 0){
			
			$row = mysql_fetch_assoc($result);
			return AdRepDao::getAdRepByID($row['AdRepID']);
			
		}else{
			return new AdRep(null, null, null, null);
		}
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