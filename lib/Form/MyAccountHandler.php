<?php

require_once './lib/DB/AdRepDao.php';
require_once './lib/DB/ClientDao.php';
require_once './lib/DB/LoginDao.php';

require_once './lib/Util/SessionUtil.php';

class MyAccountHandler {

	public function handleForm(Context $context, $action){

		if($action == "changePassword"){

			if($_POST['password'] != "" && $_POST['repeatpassword'] != ""){

				$sessionLogin = LoginDao::getLoginByUsername(SessionUtil::getUsername());

				if($_POST['password'] == $_POST['repeatpassword']){
					LoginDao::updateUserPassword($sessionLogin, $_POST['password']);

				}else{

					$context->addError("Passwords don't match.");

				}

			}else{

				$context->addError("Required field left blank.");

			}

		}else if($action == "updateAccount"){
				
			if($_POST['name'] != "" && $_POST['email'] != "" &&
				$_POST['phone'] != "" ){

				$sessionLogin = LoginDao::getLoginByUsername(SessionUtil::getUsername());

				if($sessionLogin->getType() == Login::ADREP){
					
					$adrep = AdRepDao::getAdRepByLogin($sessionLogin);
					
					AdRepDao::updateAdRep($adrep, $_POST['name'], $_POST['email'], $_POST['phone']);
						
				}else if($sessionLogin->getType() == Login::CLIENT){
						
					if($_POST['address'] != ""){

						$client = ClientDao::getClientByLogin($sessionLogin);
							
						ClientDao::updateClient($client, $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['address']);
						
					}else{

						$context->addError("Required field left blank.");

					}
						
				}else{
						
					$context->addError("Unknown Account Type.");
						
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