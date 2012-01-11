<?php

require_once './lib/DB/AdRep.php';
require_once './lib/DB/AdRepDao.php';
require_once './lib/DB/BillingStatus.php';
require_once './lib/DB/Database.php';
require_once './lib/DB/DesignStatus.php';
require_once './lib/DB/DesignStatusDao.php';
require_once './lib/DB/InsertionOrder.php';
require_once './lib/DB/InsertStatus.php';
require_once './lib/DB/InsertStatusDao.php';

class InsertionOrderDao {

	public static function createForClient($clientId, $insertDate, $design, $color, $columns, $height, $inserts, $placements){

		$status = InsertStatusDao::getRecieved();

		$query = "INSERT INTO ".Database::addPrefix('insertionorders')."
	SET ClientID = '".Database::makeStringSafe($clientId)."', Design = '".Database::makeStringSafe($design)."',
	StatusID = '".Database::makeStringSafe($status->getID())."', Color = '".Database::makeStringSafe($color)."',
	Columns = '".Database::makeStringSafe($columns)."', Height = '".Database::makeStringSafe($height)."',
	NumInserts = '".Database::makeStringSafe($inserts)."', NumPlacements = '".Database::makeStringSafe($placements)."',
	CreatedDate = '".Database::CurrentMySQLDate()."', UpdatedDate = '".Database::CurrentMySQLDate()."',
	InsertDate = '".Database::makeStringSafe($insertDate)."', BillingStatus = 'Paid'";
			
		Database::doQuery($query);

	}

	public static function createForClientWithImage($clientId, $insertDate, $design, $color, $columns, $height, $inserts, $placements, $image){

		$status = InsertStatusDao::getRecieved();

		$query = "INSERT INTO ".Database::addPrefix('insertionorders')."
			SET ClientID = '".Database::makeStringSafe($clientId)."', Design = '".Database::makeStringSafe($design)."', 
		StatusID = '".Database::makeStringSafe($status->getID())."', Color = '".Database::makeStringSafe($color)."', 
		Columns = '".Database::makeStringSafe($columns)."', Height = '".Database::makeStringSafe($height)."', 
		NumInserts = '".Database::makeStringSafe($inserts)."', NumPlacements = '".Database::makeStringSafe($placements)."', 
		CreatedDate = '".Database::CurrentMySQLDate()."', UpdatedDate = '".Database::CurrentMySQLDate()."', 
		InsertDate = '".Database::makeStringSafe($insertDate)."', BillingStatus = 'Paid', 
		Image = '".$image."'";

		Database::doQuery($query);

	}

	public static function getOrdersByClientID($clientId){
		$query = "SELECT * FROM ".Database::addPrefix('insertionorders')." WHERE ClientID = '".$clientId."'";
		$result = Database::doQuery($query);
		$oders = array();
		while($row = mysql_fetch_assoc($result)){
				
			$orders[] = InsertionOrderDao::populateInsertionOrder($row);
				
		}
		return $orders;
	}

	public static function getByID($ID){
		$query = "SELECT * FROM ".Database::addPrefix('insertionorders')." WHERE InsertId = '".$ID."'";
		$result = Database::doQuery($query);
		$row = mysql_fetch_assoc($result);
		if($row){
			return InsertionOrderDao::populateInsertionOrder($row);
		}else{
			return null;
		}
	}

	private static function populateInsertionOrder($row){
		
		$adRep;
		if(isset($row['AdRepId'])){
		$adRep = AdRepDao::getAdRepByID($row['AdRepId']);
				}else{
		$adRep = AdRep::unassignedAdRep();
		}
		$client = ClientDao::getClientByID($row['ClientID']);
			
		$status = InsertStatusDao::getByID($row['StatusID']);
			
		if(isset($row['DesignStatusID'])){
			$designStatus = DesignStatusDao::getByID($row['DesignStatusID']);
		}else{
			$designStatus = DesignStatus::emptyDesignStatus();
		}
			
		$billingStatus = BillingStatus::getStatusForName($row['BillingStatus']);
			
		return new InsertionOrder($row['InsertID'], $adRep, $client, $status, $designStatus, $billingStatus, $row['CreatedDate'], $row['UpdatedDate'], $row['InsertDate'], $row['Columns'], $row['Height'], $row['NumPlacements'], $row['Design'], $row['Color'], $row['NumInserts'], $row['Image']);

	}

}

?>