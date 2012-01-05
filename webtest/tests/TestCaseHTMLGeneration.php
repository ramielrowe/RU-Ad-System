<?php

require_once 'PHPUnit/Autoload.php';
require_once '../lib/DB/Status.php';
require_once '../lib/DB/AdRep.php';
require_once '../lib/DB/InsertionOrder.php';

class TestCaseHTMLGeneration extends PHPUnit_Framework_TestCase{

	public function testStatusGenerateTableCellHTML(){
	
		$status = new Status(1, "Status Name", "Test description.");
		
		$this->assertEquals("<a href=\"#\" title=\"Test description.\" class=\"info\">Status Name</a>",
			$status->generateTableCellHTML());
	
	}
	
	public function testAdRepGenerateTableCellHTMLWithEmail(){
	
		$adRep = new AdRep(1, "Andrew Melton", "andrew@melton.com", "806-267-0327");
	
		$this->assertEquals("<a href=\"mailto:andrew@melton.com\" class=\"info\" title=\"andrew@melton.com\">Andrew Melton</a>",
			$adRep->generateTableCellHTMLWithEmail());
	
	}
	
	public function testAdRepGenerateTableCellHTMLWithOutEmail(){
	
		$adRep = new AdRep(1, "Andrew Melton", "andrew@melton.com", "806-267-0327");
	
		$this->assertEquals("Andrew Melton",
			$adRep->generateTableCellHTMLWithOutEmail());
	
	}
	
	public function testInsertionOrderGenerateHTML(){
	
		$adRep = new AdRep(1, "Andrew Melton", "andrew@melton.com", "806-267-0327");
		$status = new Status(1, "Status Name", "Test description.");
		$designStatus = new Status(1, "Design Status Name", "Test design description.");
		$billingStatus = new Status(1, "Billing Status Name", "Test billing description.");
		$insertOrder = new InsertionOrder($adRep, $status, $designStatus, $billingStatus,
		"9/20/2011", "9/26/2011", "9/27/2011", 2, 4, 2, "In-House", "CMYK", 0, "ball");
		
		$expectedHtml = "
<tr>

	<td class=\"adrep\"><a href=\"mailto:andrew@melton.com\" class=\"info\" title=\"andrew@melton.com\">Andrew Melton</a></td>
	<td class=\"created\">9/20/2011</td>
	<td class=\"updated\">9/26/2011</td>
	<td class=\"issue\">9/27/2011</td>
	<td class=\"status\"><a href=\"#\" title=\"Test description.\" class=\"info\">Status Name</a></td>
	<td class=\"designstatus\"><a href=\"#\" title=\"Test design description.\" class=\"info\">Design Status Name</a></td>
	<td class=\"billingstatus\"><a href=\"#\" title=\"Test billing description.\" class=\"info\">Billing Status Name</a></td>
	<td class=\"arrow\"><div class=\"arrow\"></div></td>

</tr>

<tr>

	<td colspan=\"8\">
	
		<a href=\"ball.jpg\" target=\"_blank\" class=\"preview\"><img src=\"ball_rs.jpg\"></a>
		<ul>
			<li>2 Columns x 4 Inches</li>
			<li>Placements: 2</li>
			<li>Design: In-House</li>
			<li>Color: CMYK</li>
			<li>Inserts: 0</li>
	
	</td>

</tr>";

	$this->assertEquals($expectedHtml, $insertOrder->generateDualRowHTML());
	
	}

}

?>