<?php

class Context{

	private $pageID;
	private $errors = array();
	
	public function getPageID(){
	
		return $this->pageID;
	
	}
	
	public function setPageID($pageid){
	
		$this->pageID = $pageid;
	
	}
	
	public function addError($error){
	
		$this->errors[] = $error;
	
	}
	
	public function getErrors(){
	
		return $this->errors;
	
	}

}

?>