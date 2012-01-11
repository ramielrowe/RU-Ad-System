<?php


require_once './Config.php';

require_once './lib/DB/ClientDao.php';
require_once './lib/DB/Database.php';
require_once './lib/DB/InsertionOrderDao.php';

require_once './lib/Util/SessionUtil.php';
require_once './lib/Util/SimpleImage.php';

if(!SessionUtil::start())
	echo "Error Starting Session";

Database::Open();

if(isset($_GET['insertId'])){
	
	$insert = InsertionOrderDao::getByID($_GET['insertId']);
	
	if(!$insert){
		$image = new SimpleImage();
		$image->load('./images/notfound.png');
		header('Content-Type: image/jpeg');
		echo $image->output();
		exit();
	}
	
	$client = ClientDao::getClientByLogin(LoginDao::getLoginByUsername(SessionUtil::getUsername()));
	
	if($insert->getClient()->getID() == $client->getID() && file_exists($insert->getImageLoc())){
		$image = new SimpleImage();
		$image->load($insert->getImageLoc());
		$hratio = 150/$image->getHeight();
		$wratio = 150/$image->getWidth();
		
		$image->scale(min($hratio, $wratio)*100);
		header('Content-Type: image/jpeg');
		echo $image->output();
	}else{
		$image = new SimpleImage();
		$image->load('./images/notfound.png');
		header('Content-Type: image/jpeg');
		echo $image->output();
		exit();
	}
	
}

Database::Close();

?>