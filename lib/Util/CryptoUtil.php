<?php

require_once './Config.php';

class CryptoUtil{

	private static $iv = "1b84j4pi";

	/*

		New Encryption Scheme, BLOWFISH

	*/

	public static function encrypt($v_text){
	
		return mcrypt_encrypt(MCRYPT_BLOWFISH,Config::getVariable('blowfish_key'),$v_text,MCRYPT_MODE_CFB, CryptoUtil::$iv);
		
	}

	/*
		
		New Encryption Scheme, BLOWFISH

	*/

	public static function decrypt($v_text){

		return mcrypt_decrypt(MCRYPT_BLOWFISH,Config::getVariable('blowfish_key'),$v_text,MCRYPT_MODE_CFB, CryptoUtil::$iv);
		
	}

}

?>