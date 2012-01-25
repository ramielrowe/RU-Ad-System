<?php

require_once './lib/DB/Issue.php';

class IssueDao {

	public static function getIssuesAfterDate($date){
		
		$issues = array();
		
		$result = Database::doQuery("SELECT * FROM ".Database::addPrefix("issues")." WHERE date > '".Database::makeStringSafe($date)."'");
		
		while($row = mysql_fetch_assoc($result)){
			$issues[] = new Issue($row['issue_id'], $row['date']);
		}
		
		return $issues;
		
	}
	
	public static function getIssuesAfterCurrentDate(){
		
		return IssueDao::getIssuesAfterDate(Database::CurrentMySQLDate());
		
	}

}

?>