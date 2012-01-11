<?php

require_once './lib/DB/ClientDao.php';
require_once './lib/DB/InsertionOrderDao.php';
require_once './lib/DB/Login.php';
require_once './lib/DB/LoginDao.php';

class CreateInsertionHandler {


	public function handleForm($context, $action){

		if($action == "clientCreateInsertion"){

			$login = LoginDao::getLoginByUsername(SessionUtil::getUsername());

			if($login->getType() == Login::CLIENT){

				if((isset($_POST['insertdate']) && isset($_POST['design']) && isset($_POST['color']) &&
				isset($_POST['columns']) && isset($_POST['height']) && isset($_POST['inserts']) &&
				isset($_POST['placements'])) &&
				($_POST['insertdate'] != "" && $_POST['design'] != "" &&
				$_POST['color'] != "" && $_POST['columns'] != "" &&
				$_POST['height'] != "" && $_POST['inserts'] != "")){
						
					if($_POST['design'] == "In-House"){

						$this->handleInHouseDesign($context);

					}else if($_POST['design'] == "Client" && isset($_FILES['sampleimage'])){

						$this->handleClientDesign($context);

					}else if($_POST['design'] == "Client" && !isset($_FILES['sampleimage']['size'])){
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

		$insertDate = explode('/',$_POST['insertdate']);
		$mysqlFormattedDate = $insertDate[2] . "-" . $insertDate[1] . "-" . $insertDate[0];

		if(isset($_FILES['sampleimage'])){

			$insertDate = explode('/',$_POST['insertdate']);
			$mysqlFormattedDate = $insertDate[2] . "-" . $insertDate[1] . "-" . $insertDate[0];
				
			$clientId = ClientDao::getClientByLogin(LoginDao::getLoginByUsername(SessionUtil::getUsername()))->getID();
				
			$filename = $this->saveSampleImage($context, $_FILES['sampleimage'], $clientId);
				
			if($filename != ""){
					
				InsertionOrderDao::createForClientWithImage(
				ClientDao::getClientByLogin(LoginDao::getLoginByUsername(SessionUtil::getUsername()))->getID(),
				$mysqlFormattedDate, $_POST['design'], $_POST['color'],
				$_POST['columns'], $_POST['height'], $_POST['inserts'],
				$_POST['placements'], $filename);
					
			}

		}else{

			InsertionOrderDao::createForClient(
			ClientDao::getClientByLogin(LoginDao::getLoginByUsername(SessionUtil::getUsername()))->getID(),
			$mysqlFormattedDate, $_POST['design'], $_POST['color'],
			$_POST['columns'], $_POST['height'], $_POST['inserts'],
			$_POST['placements']);

		}

	}

	public function handleClientDesign(Context $context){

		$insertDate = explode('/',$_POST['insertdate']);
		$mysqlFormattedDate = $insertDate[2] . "-" . $insertDate[1] . "-" . $insertDate[0];

		$clientId = ClientDao::getClientByLogin(LoginDao::getLoginByUsername(SessionUtil::getUsername()))->getID();

		$filename = $this->saveSampleImage($context, $_FILES['sampleimage'], $clientId);

		if($filename != ""){
				
			InsertionOrderDao::createForClientWithImage(
			ClientDao::getClientByLogin(LoginDao::getLoginByUsername(SessionUtil::getUsername()))->getID(),
			$mysqlFormattedDate, $_POST['design'], $_POST['color'],
			$_POST['columns'], $_POST['height'], $_POST['inserts'],
			$_POST['placements'], $filename);

		}

	}

	public function saveSampleImage(Context $context, $file, $clientId){

		$type = $file['type'];
		$size = $file['size'];

		if($type == "image/gif" || $type == "image/jpeg"
		|| $type == "image/pjpeg" || $type == "image/png"){

			if($size < 20000000){
					
				$filename = explode('.', $file['name']);
				$newFilename = "./uploads/" . "c" . $clientId . "t" . time() . "." .$filename[count($filename) - 1];

				$success = move_uploaded_file($file['tmp_name'], $newFilename);

				if(!$success){
					$context->addError("Error Uploading File.");
					return "";
				}else{
					return $newFilename;
				}

					
			}else{
				$context->addError("File Size Too Large.");
				return "";
			}

		} else if ($type == "application/pdf" || $type == "image/psd"
		|| $type = "image/photoshop" || $type = "image/x-photoshop"
		|| $type = "image/vnd.adobe.photoshop"){

			$filename = explode('.', $file['name']);
			$newFilename = "./uploads/" . "c" . $clientId . "t" . time() . "." .$filename[count($filename) - 1];
				
			$success = move_uploaded_file($file['tmp_name'], $newFilename);

			if(!$success){
				$context->addError("Error Uploading File.");
				return "";
			}else{
				return $newFilename;
			}

		}else{
			$context->addError("Unrecognized File Type.");
			return "";
		}


	}

}

?>