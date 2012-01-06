<?php

require_once './lib/DB/LoginDao.php';

require_once './lib/Util/Context.php';

class RegisterHandler{

	public function handleForm($context, $action){
	
		if($action == "client"){
		
			if($_POST['name'] != "" && $_POST['username'] != "" && 
				$_POST['password'] != "" && $_POST['repeatpassword'] != "" &&
				$_POST['email'] != "" && $_POST['phone'] != "" && 
				$_POST['address'] != ""){
			
				if($_POST['password'] == $_POST['repeatpassword']){
				
					if(LoginDao::usernameFree($_POST['username'])){
					
						//LoginDao::createLogin($_POST['username'], $_POST['password']);
					
					}else{
					
						$context->addError("Username already taken.");
					
					}
					
				}else{
				
					$context->addError("Passwords don't match.");
					
				}
				
			}else{
			
				$context->addError("Required field left blank.");
			
			}
		
		}
	
	}

}

?>