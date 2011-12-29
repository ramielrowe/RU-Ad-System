<?php

require_once "Navigation.php";
require_once "NaviButton.php";

class StandardNavigation extends Navigation{

	private $pageID;

	public function __construct($pageid){
	
		$this->pageID = $pageid;
	
	}

	public function generateHTML(){
	
		$homeSelected = false;
		$createInsertSelected = false;
		$myInsertsSelected = false;
		$myAccountSelected = false;
		
		if($this->pageID == "home"){
			$homeSelected = true;
		}
		else if($this->pageID == "createInsertion"){
			$createInsertSelected = true;
		}
		else if($this->pageID == "myInserts"){
			$myInsertsSelected = true;
		}
		else if($this->pageID == "myAccount"){
			$myAccountSelected = true;
		}
	
		$homeButton = new NaviButton("Home", "./index.php?pageid=home", $homeSelected);
		$createInsertButton = new NaviButton("Create Insertion", "./index.php?pageid=createInsertion", $createInsertSelected);
		$myInsertsButton = new NaviButton("My Insertions", "./index.php?pageid=myInserts", $myInsertsSelected);
		$myAccountButton = new NaviButton("My Account", "./index.php?pageid=myAccount", $myAccountSelected);
	
		return $homeButton->generateHTML()." ".
			$createInsertButton->generateHTML()." ".
			$myInsertsButton->generateHTML()." ".
			$myAccountButton->generateHTML();
	
	}

}

?>