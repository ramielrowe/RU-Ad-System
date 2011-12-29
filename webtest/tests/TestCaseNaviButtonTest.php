<?php

require_once 'PHPUnit/Autoload.php';
require_once '../NaviButton.php';

class TestCaseNaviButtonTest extends PHPUnit_Framework_TestCase{

	public function testUnselectedNaviButton(){
	
		$testButton = new NaviButton("Test Button", "http://www.google.com", false);
		
		$actualHTML = $testButton->generateHTML();
		$expectedHTML = "<a href=\"http://www.google.com\" class=\"button bigrounded gray\">Test Button</a>";
	
		$this->assertEquals($expectedHTML, $actualHTML);
	
	}

	public function testSelectedNaviButton(){
	
		$testButton = new NaviButton("Test Button", "http://www.google.com", true);
		
		$actualHTML = $testButton->generateHTML();
		$expectedHTML = "<a href=\"http://www.google.com\" class=\"button bigrounded orange\">Test Button</a>";
	
		$this->assertEquals($expectedHTML, $actualHTML);
	
	}

}

?>