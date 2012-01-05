<?php

require_once 'Page.php';

class HomeBody extends Body{

	public function getTitle(){
	
		return "Home";
	
	}
	
	public function getScriptsHTML(){
		return "";
	}

	public function generateHTML(){
	
		return "blah";
	
	}

}

?>