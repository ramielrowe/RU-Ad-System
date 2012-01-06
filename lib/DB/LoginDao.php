<?php

require_once 'Database.php';
require_once 'Login.php';

require_once './lib/Util/CryptoUtil.php';

class LoginDao{

	public static function getLoginById($ID){

		$query = "SELECT * FROM ".Database::addPrefix('logins')." WHERE LoginID = '".Database::makeStringSafe($ID)."' LIMIT 1";

		$result = Database::doQuery($query);

		if(mysql_num_rows($result) == 1){

			$login = mysql_fetch_assoc($result);

			return new Login($login['LoginID'],$login['Username'],$login['Password'],$login['UserType']);

		}else{

			return null;

		}

	}

	public static function getLoginByUsername($username){

		$query = "SELECT * FROM ".Database::addPrefix('logins')." WHERE username = '".Database::makeStringSafe($username)."' LIMIT 1";

		$result = Database::doQuery($query);

		if(mysql_num_rows($result) == 1){

			$login = mysql_fetch_assoc($result);

			return new Login($login['LoginID'],$login['Username'],$login['Password'],$login['UserType']);
				
		}else{

			return null;

		}

	}

	public static function usernameFree($username){

		return LoginDao::getLoginByUsername($username) == null;

	}

	public static function createLogin($username, $password, $type = Login::CLIENT){

		$query = "INSERT INTO ".Database::addPrefix('logins')."
			SET Username = '".Database::makeStringSafe($username)."',
			Password = '".Database::makeStringSafe(CryptoUtil::encrypt($password))."',
			UserType = '".Database::makeStringSafe($type)."'";
			
		Database::doQuery($query);

		return LoginDao::getLoginByUsername($username);

	}

	public static function updateUserPassword($login, $password){

		if($login instanceof Login){
				
			$query = "UPDATE ".Database::addPrefix('logins')."
							SET password = '".Database::makeStringSafe(CryptoUtil::encrypt($password))."'
							WHERE LoginID = '".$login->getID()."'";
			
			Database::doQuery($query);
			
		}else{

			$query = "UPDATE ".Database::addPrefix('logins')."
				SET password = '".Database::makeStringSafe(CryptoUtil::encrypt($password))."'
				WHERE LoginID = '".Database::makeStringSafe($login)."'";

			Database::doQuery($query);

		}

	}

	public static function authUser($username, $password){

		$login = LoginDao::getLoginByUsername($username);

		if($login != null && CryptoUtil::encrypt($password) == $login->getEncryptedPassword()){

			return $login;

		}

		return null;

	}

}

?>