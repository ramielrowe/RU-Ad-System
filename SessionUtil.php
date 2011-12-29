<?php

require_once 'Config.php';

class SessionUtil{	
	
	private static function getSessionPrefix(){
	
		return Config::getVariable("location");
	
	}

	public static function getVariable($vName){
	
		return $_SESSION[SessionUtil::getSessionPrefix()+"~|~"+$vName];
	
	}
	
	public static function setVariable($vName, $value){
	
		$_SESSION[SessionUtil::getSessionPrefix()+"~|~"+$vName] = $value;
	
	}
	public static function isVariableSet($vName){
	
		return isset($_SESSION[SessionUtil::getSessionPrefix()+"~|~"+$vName]);
	
	}

}

?>