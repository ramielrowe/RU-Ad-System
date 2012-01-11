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

			return ClientDao::getClientByLogin(LoginDao::getLoginById($login));
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

	public static function getClientByID($ID){

		$query = "SELECT * FROM ".Database::addPrefix('clients')." WHERE ClientID = '".Database::makeStringSafe($ID)."' LIMIT 1";
		
		$result = Database::doQuery($query);

		if(mysql_num_rows($result) == 1){

			$client = mysql_fetch_assoc($result);

			return new Client($client['ClientID'], LoginDao::getLoginById($client['LoginID']), $client['Name'],
			$client['Email'], $client['Phone'], $client['Address']);

		}else{

			return null;

		}

	}

	public static function updateClient($client, $name, $email, $phone, $address){

		if($client instanceof Client){

			$query = "UPDATE ".Database::addPrefix('clients')."
				SET Name = '".$name."', Email = '".$email."',
				Phone = '".$phone."', Address = '".$address."'
			 	WHERE ClientID = '".Database::makeStringSafe($client->getID())."' LIMIT 1";
				
			Database::doQuery($query);
				
			return ClientDao::getClientByID($client->getID());

		}else{
			$query = "UPDATE ".Database::addPrefix('clients')."
							SET Name = '".$name."', Email = '".$email."',
							Phone = '".$phone."', Address = '".$address."'
						 	WHERE ClientID = '".Database::makeStringSafe($client)."' LIMIT 1";

			Database::doQuery($query);

			return ClientDao::getClientByID($client->getID());
		}

	}

}

?>