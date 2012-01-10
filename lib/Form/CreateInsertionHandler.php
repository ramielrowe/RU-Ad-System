<?php

require_once './lib/DB/ClientDao.php';
require_once './lib/DB/InsertionOrderDao.php';
require_once './lib/DB/Login.php';
require_once './lib/DB/LoginDao.php';

class CreateInsertionHandler {

	/*
insertdate
design
color
columns
height
inserts
placements
sampleimage
	 */
	
	public function handleForm($context, $action){
	
		if($action == "clientCreateInsertion"){
	
			$login = LoginDao::getLoginByUsername(SessionUtil::getUsername());
			
			if($login->getType() == Login::CLIENT){
				
				if(isset($_POST['insertdate']) && isset($_POST['design']) && isset($_POST['color']) &&
				 isset($_POST['columns']) && isset($_POST['height']) && isset($_POST['inserts']) &&
				 isset($_POST['placements'])){
					
					if($_POST['design'] == "In-House"){
						
						$this->handleInHouseDesign($context);
						
					}else if($_POST['design'] == "Client" && isset($_POST['sampleimage'])){
						
						$this->handleClientDesign($context);
						
					}else if($_POST['design'] == "Client" && !isset($_POST['sampleimage'])){
						$context->addError("Sample Image Required For Client Provided Design.");
					}else{
						$context->addError("Unknown Design Type");
					}
					
				}else{
					$context->addError("Required Field Left Blank.");
				}
				
			}else{
				$context->addError("Incorrect Action.");
			}
			
	
		}else{
			$context->addError("Incorrect Action.");
		}
	
	}
	
	public function handleInHouseDesign(Context $context){
		
		if(isset($_POST['sampleimage'])){
			
			// TODO: Save file to disk and insert to database
			
		}else{
			
			// TODO: Convert insertdate to mysql date format.
			
			InsertionOrderDao::createForClient(
			ClientDao::getClientByLogin(LoginDao::getLoginByUsername(SessionUtil::getUsername()))->getID(), 
			$_POST['insertdate'], $_POST['design'], $_POST['color'],
			 $_POST['columns'], $_POST['height'], $_POST['inserts'],
			 $_POST['placements']);
			
		}
		
	}
	
	public function handleClientDesign(Context $context){
		
		// TODO: Save file to disk and insert to database
		
	}

}

?>