<?php

require_once "Navigation.php";
require_once "NaviButton.php";

class StandardNavigation extends Navigation{

	private $context;

	public function __construct($context){
	
		$this->context = $context;
	
	}

	public function generateHTML(){
	
		if(SessionUtil::isLoggedIn()){
	
			$homeSelected = false;
			$createInsertSelected = false;
			$myInsertsSelected = false;
			$myAccountSelected = false;
			
			if($this->context->getPageID() == "home"){
				$homeSelected = true;
			}
			else if($this->context->getPageID() == "createInsertion"){
				$createInsertSelected = true;
			}
			else if($this->context->getPageID() == "myInserts"){
				$myInsertsSelected = true;
			}
			else if($this->context->getPageID() == "myAccount"){
				$myAccountSelected = true;
			}
		
			$homeButton = new NaviButton("Home", "./index.php?pageid=home", $homeSelected);
			$createInsertButton = new NaviButton("Create Insertion", "./index.php?pageid=createInsertion", $createInsertSelected);
			$myInsertsButton = new NaviButton("My Insertions", "./index.php?pageid=myInserts", $myInsertsSelected);
			$myAccountButton = new NaviButton("My Account", "./index.php?pageid=myAccount", $myAccountSelected);
			$logoutButton = new NaviButton("Logout", "./index.php?pageid=logout", false);
		
			return $homeButton->generateHTML()." ".
				$createInsertButton->generateHTML()." ".
				$myInsertsButton->generateHTML()." ".
				$myAccountButton->generateHTML()." ".
				$logoutButton->generateHTML();
			
		}else{
		
			if($this->context->getPageID() == "login"){
		
				return "<div class=\"centered\">
					<form action=\"index.php?pageid=login\" method=\"POST\">
						<input type=\"hidden\" name=\"action\" value=\"login\" />
						<input name=\"username\" type=\"text\" placeholder=\"Username\" class=\"text\" />
						<input name=\"password\" type=\"password\" placeholder=\"Password\" class=\"text\" />
						<input type=\"submit\" value=\"Login\" class=\"goodbutton\" />
						<input type=\"button\" value=\"Register\" onclick=\"location.href='./index.php?pageid=register'\" class=\"goodbutton\" />
					</form>
				</div>";
				
			}else{
				return "";
			};
		
		}
	
	}

}

?>