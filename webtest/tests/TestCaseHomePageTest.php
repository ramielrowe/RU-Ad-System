<?php

require_once 'PHPUnit/Autoload.php';

require_once '../Page.php';
require_once '../StandardLayout.php';
require_once '../StandardNavigation.php';
require_once '../HomeBody.php';
require_once '../SessionUtil.php';

require_once 'TestUtil.php';

class TestCaseHomePageTest extends PHPUnit_Framework_TestCase{

	/*public function assertHTMLEquals($expectedPage, $actualPage){
	
		$this->assertNotNull($actualPage);
		$this->assertEquals(TestUtil::cleanHTML($expectedPage), TestUtil::cleanHTML($actualPage));
	
	}

	public function testGenerateHomePage(){
	
		SessionUtil::setVariable("user_level", 1);
		
		$layout = new StandardLayout("Homepage", new StandardNavigation(), new HomeBody());
		$homepage = new Page(1, $layout);

		$actualHTML = $homepage->generateHTML();
	
		$expectedHTML = 
"<html>
	<head>
	<title>Homepage</title>
	</head>
	<body>
	<table border=\"1\">
		<tr>
			<th>link | link</th>
		</tr>
		<tr>
			<th>blah</th>
		</tr>
	</table>
	</body>
</html>";

		$this->assertHTMLEquals($expectedHTML, $actualHTML);
	
	}
	
	public function testUnauthorizedAccessPage(){
	
		SessionUtil::setVariable("user_level", 1);
		
		$layout = new StandardLayout("Homepage", new StandardNavigation(), new HomeBody());
		$homepage = new Page(2, $layout);

		$actualHTML = $homepage->generateHTML();
		
		$expectedHTML = "<html><body>Unauthorized Access</body></html>";
	
		$this->assertHTMLEquals($expectedHTML, $actualHTML);
	
	}*/
	
}

?>