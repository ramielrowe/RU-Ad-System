<?php

require_once 'Page.php';

class RegisterBody extends Body{

	private $context;

	public function __construct(&$context){
		$this->context = $context;
	}
	
	public function getTitle(){
	
		return "Register";
	
	}

	public function getScriptsHTML(){
		return "";
	}

	public function generateHTML(){
	
		$errorhtml = "<div class=\"centered error\">";
		$errors  = $this->context->getErrors();
		foreach($errors as $error){
		
			$errorhtml = $errorhtml." ".$error."<br />";
		
		}
		$errorhtml = $errorhtml."</div>";
		
		$nameValue = "";
		$usernameValue = "";
		$emailValue = "";
		$phoneValue = "";
		$addressValue = "";
		
		if(isset($_POST['action'])){
		
			$nameValue = "value=\"".$_POST['name']."\"";
			$usernameValue = "value=\"".$_POST['username']."\"";
			$emailValue = "value=\"".$_POST['email']."\"";
			$phoneValue = "value=\"".$_POST['phone']."\"";
			$addressValue = $_POST['address'];
			
		}
		
		
		return $errorhtml."<div style=\"width: 45%; margin-left: auto; margin-right: auto;\">
	
		<form action=\"index.php?pageid=register\" method=\"POST\">
			<div style=\"float: left; text-align: left;\">
				<input type=\"hidden\" name=\"action\" value=\"client\"/>
				<label for=\"name\" class=\"above\">Name</label>
				<input name=\"name\" type=\"text\" placeholder=\"Name\" class=\"text bluefocus\"  ".$nameValue." />
				<label for=\"username\" class=\"above\">Username</label>
				<input name=\"username\" type=\"text\" placeholder=\"Username\" class=\"text bluefocus\"  ".$usernameValue." />
				<label for=\"password\" class=\"above\">Password</label>
				<input name=\"password\" type=\"password\" placeholder=\"Password\" class=\"text bluefocus\" />
				<label for=\"password\" class=\"above\">Repeat Password</label>
				<input name=\"repeatpassword\" type=\"password\" placeholder=\"Password\" class=\"text bluefocus\" />
			</div>
			<div style=\"float: right; text-align:right;\">
				<label for=\"email\" class=\"above\">Email</label>
				<input name=\"email\" type=\"email\" placeholder=\"Email\" class=\"text bluefocus\"  ".$emailValue." />
				<label for=\"phone\" class=\"above\">Phone</label>
				<input name=\"phone\" type=\"text\" placeholder=\"Phone\" class=\"text bluefocus\"  ".$phoneValue." />
				<label for=\"address\" class=\"above\">Address</label>
				<textarea name=\"address\" rows=\"3\" cols=\"23\" class=\"text bluefocus\">".$addressValue."</textarea>
			</div>
			<div style=\"float: right; text-align:right;\">
				<br /><input type=\"submit\" value=\"Register\" class=\"stdbutton bluefocus\" />
				<input type=\"button\" value=\"Cancel\" onclick=\"location.href='./index.php?pageid=login'\" class=\"altbutton bluefocus\" />
			</div>
		</form>
		</div>";
	
	}

}

?>