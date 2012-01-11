<?php

require_once './lib/DB/Database.php';
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

}

?>