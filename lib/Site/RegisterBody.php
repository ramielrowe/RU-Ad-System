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
				<label for=\"name\">Name</label>
				<input name=\"name\" type=\"text\" placeholder=\"Name\" class=\"text\"  ".$nameValue." />
				<label for=\"username\">Username</label>
				<input name=\"username\" type=\"text\" placeholder=\"Username\" class=\"text\"  ".$usernameValue." />
				<label for=\"password\">Password</label>
				<input name=\"password\" type=\"password\" placeholder=\"Password\" class=\"text\" />
				<label for=\"password\">Repeat Password</label>
				<input name=\"repeatpassword\" type=\"password\" placeholder=\"Password\" class=\"text\" />
			</div>
			<div style=\"float: right; text-align:right;\">
				<label for=\"email\">Email</label>
				<input name=\"email\" type=\"text\" placeholder=\"Email\" class=\"text\"  ".$emailValue." />
				<label for=\"phone\">Phone</label>
				<input name=\"phone\" type=\"text\" placeholder=\"Phone\" class=\"text\"  ".$phoneValue." />
				<label for=\"address\">Address</label>
				<textarea name=\"address\" rows=\"3\" cols=\"23\" class=\"text\">".$addressValue."</textarea>
				<br /><br /><input type=\"submit\" value=\"Register\" class=\"goodbutton\" />
			</div>
		</form>
		</div>";
	
	}

}

?>