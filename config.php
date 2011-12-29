<?php

class Config{

	private static $config = array(

		'maint_mode' => false,

		'location' => 'http://localhost/adsys/'

		);
		
	private static function getConfig(){
	
		return Config::$config;
	
	}
	
	public static function getVariable($vName){

		$configVals = Config::getConfig();
	
		return $configVals[$vName];

	}

}

?>
