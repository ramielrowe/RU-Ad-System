<?php

require_once './config.php';

class SessionUtil{
	
	private static function getSessionPrefix(){
	
		return Config::getVariable("location");
	
	}
	
	public static function start(){
		
		SessionUtil::regen();
		return session_start();
	
	}
	
	private static function regen(){
		
		
		session_regenerate_id(true);
		
	}
	
	public static function clear(){
	
		session_unset();
	
	}
	
	public static function destroy(){
	
		return session_destroy();
	
	}
	
	public static function restart(){
	
		SessionUtil::clear();
		SessionUtil::destroy();
		SessionUtil::start();
	
	}

	public static function getVariable($vName){
	
		return $_SESSION[SessionUtil::getSessionPrefix()."~".$vName];
	
	}
	
	public static function setVariable($vName, $value){
	
		$_SESSION[SessionUtil::getSessionPrefix()."~".$vName] = $value;
	
	}
	
	public static function isVariableSet($vName){
	
		return isset($_SESSION[SessionUtil::getSessionPrefix()."~".$vName]);
	
	}
	
	public static function getUsername(){
	
		return SessionUtil::getVariable("username");
	
	}
	
	public static function login($login){
	
		SessionUtil::setVariable("username", $login->getUsername());
		SessionUtil::setVariable("userlevel", 1);
	
	}
	
	public static function getUserlevel(){
	
		if(SessionUtil::isVariableSet("userlevel"))	
			return SessionUtil::getVariable("userlevel");
		else
			return 0;
	}
	
	public static function isLoggedIn(){
	
		return SessionUtil::isVariableSet("username") && SessionUtil::isVariableSet("userlevel");
	
	}

}

?>