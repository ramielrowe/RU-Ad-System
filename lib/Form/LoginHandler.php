<?php

require_once './lib/DB/LoginDao.php';

require_once './lib/Util/Context.php';

class LoginHandler{

	public function handleForm($context, $action){
	
		if($action == "login"){
		
			$login = LoginDao::authUser($_POST['username'], $_POST['password']);
			
			if($login){
			
				SessionUtil::login($login);
				$context->setPageID("home");
			
			}else{
			
				$context->addError("Incorrect Login");
			
			}
		
		}else{
			
			$context->addError("Incorrect Action.");
			
		}
	
	}

}

?>