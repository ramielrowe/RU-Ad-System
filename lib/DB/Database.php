<?php

class Database{

	private static $curQueryNum = 0;
	private static $link = null;
	
	private static $server = 'localhost';
	private static $user = 'adsys';
	private static $password = 'Pass1234';
	private static $database = 'adsys';
	
	private static $tablePrefix = '';
	
	public static function Open(){

		Database::$link = mysql_connect(Database::$server, Database::$user, Database::$password);
		if (!Database::$link){
			die('<script language="Javascript"> alert("Q'.Database::$curQueryNum.': Could not connect: ' . mysql_error(Database::$link) . '")</script>');
		}
		
		$db_selected = mysql_select_db(Database::$database, Database::$link);
		if(!$db_selected){
			die('<script language="Javascript"> alert("Q' . Database::$curQueryNum . ': Couldn\'t use '.Database::$database.': ' . mysql_error(Database::$link) . '")</script>');
		}
	
	}
	
	public static function Close(){
		$error = mysql_error(Database::$link);
		
		if($error){
		
			die('<script language="Javascript"> alert("Q'.Database::$curQueryNum.': Invalid Query: ' . mysql_error(Database::$link) . '")</script>');
		
		}
		
		mysql_close(Database::$link);
		
		Database::$link = null;
	}

	public static function CurrentMySQLDate(){

		return date('Y-m-d');

	}

	public static function CurrentMySQLDateTime(){

		return date('Y-m-d H:i:s');

	}

	/*
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	!!! This !MUST! be used on all variables going into a MySQL Query!        !!!!
	!!!																		  !!!!
	!!! This will safely exit any dangerous characters in the provded string. !!!!
	!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	*/

	public static function makeStringSafe($string){

		return addslashes($string);

	}

	/*

		This is the old safe string I used before performance testing. I left it in
		simply because it would be good to use if you want to be absolutely sure
		your string is safe.

	*/

	public static function makeMySQLSafe($string){
		
		if(Database::$link == null){
		
			Database::Open();
		
		}
		
		$string = mysql_real_escape_string($string, Database::$link);
		
		return $string;

	}
	
	public static function addPrefix($tableName){
	
		return Database::$tablePrefix . $tableName;
	
	}

	/*

		All queries should be done through this function.
		On query errors it will popup an error message with the query number
		and a short description of the error.

	*/

	public static function doQuery($v_query){ 
		
		if(Database::$link == null){
		
			Database::Open();
		
		}
		
		Database::$curQueryNum = Database::$curQueryNum + 1;
		
		$result = mysql_query($v_query, Database::$link);
		if (!$result) {
			die('<script language="Javascript"> alert("Q'.Database::$curQueryNum.': Invalid Query: ' . mysql_error(Database::$link) . '\n\nQuery:\n'.$v_query.'")</script>');
		}
		
		return $result;

	}

}

?>