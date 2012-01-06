<?php

require_once '/lib/DB/AdRep.php';
require_once '/lib/DB/AdRepDao.php';
require_once '/lib/DB/Client.php';
require_once '/lib/DB/ClientDao.php';
require_once './lib/DB/Login.php';
require_once './lib/DB/LoginDao.php';

require_once './lib/Site/Body.php';

class MyAccountBody extends Body{

	private $context;
	
	public function __construct(Context $context){
		$this->context = $context;
	}
	
	function getTitle(){

		return "My Account";

	}

	function getScriptsHTML(){

		return "";

	}

	function generateHTML(){

		$login = LoginDao::getLoginByUsername(SessionUtil::getUsername());

		if($login->getType() == Login::CLIENT){

			$client = ClientDao::getClientByLogin($login);
			
			return $this->context->getErrorHTML()."<div class=\"centered\">
		
				<h3>Login</h3>
				
				<form action=\"./index.php?pageid=myAccount\" method=\"post\">
					<input type=\"hidden\" name=\"action\" value=\"changePassword\" />
					<label for=\"password\" class=\"sameline\">Password</label>
					<input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"text bluefocus\"/>
					<label for=\"password\" class=\"sameline\">Repeat Password</label>
					<input type=\"password\" name=\"repeatpassword\" placeholder=\"Repeat Password\" class=\"text bluefocus\"/>
					<input type=\"submit\" value=\"Change Password\" class=\"stdbutton bluefocus\"/>
				</form>
				
				<h3>Account Info</h3>
				
				<div style=\"width: 45%; margin-left: auto; margin-right: auto;\">
					<form action=\"./index.php?pageid=myAccount\" method=\"post\">
						<div style=\"float: left; text-align: left;\">
							<input type=\"hidden\" name=\"action\" value=\"updateAccount\" />
							<label for=\"name\" class=\"above\">Name</label>
							<input type=\"text\" name=\"name\" placeholder=\"Name\" value=\"".$client->getName()."\" class=\"text bluefocus\"/>
							<label for=\"email\" class=\"above\">Email</label>
							<input type=\"email\" name=\"email\" placeholder=\"Email\" value=\"".$client->getEmail()."\" class=\"text bluefocus\"/>
							<label for=\"phone\" class=\"above\">Phone</label>
							<input type=\"text\" name=\"phone\" placeholder=\"Phone\" value=\"".$client->getPhone()."\" class=\"text bluefocus\"/>
						</div>
						<div style=\"float: right; text-align: right;\">
							<br /><label for=\"address\" class=\"above\">Address</label>
							<textarea name=\"address\" rows=\"3\" cols=\"23\" class=\"text bluefocus\">".$client->getAddress()."</textarea>
							<br /><br /><input type=\"submit\" value=\"Update Account\" class=\"stdbutton bluefocus\"/>
						</div>
					</form>
				</div>
			
			</div>";

		}
		else if($login->getType() == Login::ADREP){
				
			$adrep = AdRepDao::getAdRepByLogin($login);
			
			return $this->context->getErrorHTML()."<div class=\"centered\">
		
				<h3>Login</h3>
				
				<form action=\"./index.php?pageid=myAccount\" method=\"post\">
					<input type=\"hidden\" name=\"action\" value=\"changePassword\" />
					<label for=\"password\" class=\"sameline\">Password</label>
					<input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"text bluefocus\"/>
					<label for=\"password\" class=\"sameline\">Repeat Password</label>
					<input type=\"password\" name=\"repeatpassword\" placeholder=\"Repeat Password\" class=\"text bluefocus\"/>
					<input type=\"submit\" value=\"Change Password\" class=\"stdbutton bluefocus\"/>
				</form>
				
				<h3>Account Info</h3>
				
				<div style=\"width: 45%; margin-left: auto; margin-right: auto;\">
					<form action=\"./index.php?pageid=myAccount\" method=\"post\">
						<div style=\"float: left; text-align: left;\">
							<input type=\"hidden\" name=\"action\" value=\"updateAccount\" />
							<label for=\"name\" class=\"above\">Name</label>
							<input type=\"text\" name=\"name\" placeholder=\"Name\" value=\"".$adrep->getName()."\" class=\"text bluefocus\"/>
							<label for=\"email\" class=\"above\">Email</label>
							<input type=\"email\" name=\"email\" placeholder=\"Email\" value=\"".$adrep->getEmail()."\" class=\"text bluefocus\"/>
						</div>
						<div style=\"float: right; text-align: right;\">
							<label for=\"phone\" class=\"above\">Phone</label>
							<input type=\"text\" name=\"phone\" placeholder=\"Phone\" value=\"".$adrep->getPhone()."\" class=\"text bluefocus\"/>
							<br /><br /><input type=\"submit\" value=\"Update Account\" class=\"stdbutton bluefocus\"/>
						</div>
					</form>
				</div>
			
			</div>";
				
		}else{
			
			return $this->context->getErrorHTML()."<div class=\"centered\">
			
				<h3>Login</h3>
				
				<form action=\"./index.php?pageid=myAccount\" method=\"post\">
					<input type=\"hidden\" name=\"action\" value=\"changePassword\" />
					<label for=\"password\" class=\"sameline\">Password</label>
					<input type=\"password\" name=\"password\" placeholder=\"Password\" class=\"text bluefocus\"/>
					<label for=\"password\" class=\"sameline\">Repeat Password</label>
					<input type=\"password\" name=\"repeatpassword\" placeholder=\"Repeat Password\" class=\"text bluefocus\"/>
					<input type=\"submit\" value=\"Change Password\" class=\"stdbutton bluefocus\"/>
				</form>
				
				<h3>Account Info</h3>
				
				<div class=\"centered error\">Unknown Account Type</div>
			
			</div>";
			
		}

	}

}

?>