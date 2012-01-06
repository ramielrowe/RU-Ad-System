<?php

require_once './lib/DB/LoginDao.php';
require_once './lib/DB/ClientDao.php';

require_once './lib/Util/Context.php';
require_once './lib/Util/SessionUtil.php';

class RegisterHandler{

	public function handleForm(Context $context, $action){
	
		if($action == "client"){
		
			if($_POST['name'] != "" && $_POST['username'] != "" && 
				$_POST['password'] != "" && $_POST['repeatpassword'] != "" &&
				$_POST['email'] != "" && $_POST['phone'] != "" && 
				$_POST['address'] != ""){
			
				if($_POST['password'] == $_POST['repeatpassword']){
				
					if(LoginDao::usernameFree($_POST['username'])){
					
						$newLogin = LoginDao::createLogin($_POST['username'], $_POST['password'], Login::CLIENT);
						
						$newClient = ClientDao::createClient($newLogin, $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address']);
						
						SessionUtil::login($newLogin);
						
						$context->setPageID("home");
					
					}else{
					
						$context->addError("Username already taken.");
					
					}
					
				}else{
				
					$context->addError("Passwords don't match.");
					
				}
				
			}else{
			
				$context->addError("Required field left blank.");
			
			}
		
		}else{
			
			$context->addError("Incorrect Action.");
			
		}
	
	}

}

?>