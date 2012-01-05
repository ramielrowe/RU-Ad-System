<?php

class Config{

	private static $config = array(

		'maint_mode' => false,

		'location' => 'http://localhost/RU-Ad-System/',

		'mysql_server' => 'localhost',

		'mysql_user' => 'adsys',

		'mysql_password' => 'Pass1234',

		'mysql_database' => 'adsys',

		'mysql_table_prefix' => '',
		
		'blowfish_key' => 'abababababababab'

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
