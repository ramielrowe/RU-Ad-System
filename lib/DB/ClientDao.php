<?php

require_once './lib/DB/Database.php';
require_once './lib/DB/Client.php';
require_once './lib/DB/Login.php';
require_once './lib/DB/LoginDao.php';

class ClientDao{
	
	public static function createClient($login, $name, $email, $phone, $address){
		
		if($login instanceof Login){
			$query = "INSERT INTO ".Database::addPrefix('clients')."
						SET LoginID = '".Database::makeStringSafe($login->getID())."',
						name = '".Database::makeStringSafe($name)."', email = '".Database::makeStringSafe($email)."',
						phone = '".Database::makeStringSafe($phone)."', address = '".Database::makeStringSafe($address)."'";
			
			Database::doQuery($query);
			
			return ClientDao::getClientByLogin($login);
		}else{
			$query = "INSERT INTO ".Database::addPrefix('clients')."
									SET LoginID = '".Database::makeStringSafe($login)."',
									name = '".Database::makeStringSafe($name)."', email = '".Database::makeStringSafe($email)."',
									phone = '".Database::makeStringSafe($phone)."', address = '".Database::makeStringSafe($address)."'";
				
			Database::doQuery($query);
				
			return ClientDao::getClientByLogin($login);
		}
		
	}
	
	public static function getClientByLogin(Login $login){

		$query = "SELECT * FROM ".Database::addPrefix('clients')." WHERE LoginID = '".Database::makeStringSafe($login->getID())."' LIMIT 1";
		
		$result = Database::doQuery($query);
		
		if(mysql_num_rows($result) == 1){
		
			$client = mysql_fetch_assoc($result);
		
			return new Client($client['ClientID'], $login, $client['Name'],
				$client['Email'], $client['Phone'], $client['Address']);
		
		}else{
		
			return null;
		
		}
	
	}
	
}

?>