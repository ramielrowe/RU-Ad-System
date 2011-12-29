<?php

require_once 'Navigation.php';
require_once 'Body.php';

abstract class Layout{

	private $navigation;
	private $body;
	private $title;
	
	public function __construct($_title, $navi, $_body){
	
		$this->title = $_title;
		$this->navigation = $navi;
		$this->body = $_body;
	
	}
	
	public function getNavigation(){
	
		return $this->navigation;
	
	}
	
	public function setNavigation($navi){
	
		$this->navigation = $navi;
	
	}
	
	public function getBody(){
	
		return $this->body;
	
	}
	
	public function setBody($_body){
	
		$this->body = $_body;
	
	}
	
	public function getTitle(){
	
		return $this->title;
	
	}
	
	public function setTitle($_title){
	
		$this->title = $_title;
	
	}
	
	public abstract function generateHTML();

}

?>