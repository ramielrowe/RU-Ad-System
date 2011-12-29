<?php

require_once 'AdRep.php';
require_once 'Status.php';

class InsertionOrder {

	// Class AdRep
	private $adRep;
	
	// Class Status
	private $status;
	
	// Class Status
	private $designStatus;
	
	// Class Status
	private $billingStatus;
	
	private $createdDate;
	private $lastUpdatedDate;
	private $issueDate;
	private $numColumns;
	private $width;
	private $numPlacements;
	private $designType;
	private $colorType;
	private $numInserts;
	private $imageName;
	
	public function __construct($adRep, $status, $designStatus, $billingStatus, $createdDate, $lastUpdatedDate, $issueDate,
	$numColumns, $width, $numPlacements, $designType, $colorType, $numInserts, $imageName){
	
		$this->adRep = $adRep;
		$this->status = $status;
		$this->designStatus = $designStatus;
		$this->billingStatus = $billingStatus;
		$this->createdDate =  $createdDate;
		$this->lastUpdatedDate = $lastUpdatedDate;
		$this->issueDate = $issueDate;
		$this->numColumns = $numColumns;
		$this->width = $width;
		$this->numPlacements = $numPlacements;
		$this->designType = $designType;
		$this->colorType = $colorType;
		$this->numInserts = $numInserts;
		$this->imageName = $imageName;
	
	}
	
	public function generateDualRowHTML(){
	
		$html = "
<tr>

	<td class=\"adrep\">".$this->adRep->generateTableCellHTMLWithEmail()."</td>
	<td class=\"created\">".$this->createdDate."</td>
	<td class=\"updated\">".$this->lastUpdatedDate."</td>
	<td class=\"issue\">".$this->issueDate."</td>
	<td class=\"status\">".$this->status->generateTableCellHTML()."</td>
	<td class=\"designstatus\">".$this->designStatus->generateTableCellHTML()."</td>
	<td class=\"billingstatus\">".$this->billingStatus->generateTableCellHTML()."</td>
	<td class=\"arrow\"><div class=\"arrow\"></div></td>

</tr>

<tr>

	<td colspan=\"8\">
	
		<a href=\"".$this->imageName.".jpg\" target=\"_blank\" class=\"preview\"><img src=\"".$this->imageName."_rs.jpg\"></a>
		<ul>
			<li>".$this->numColumns." Columns x ".$this->width." Inches</li>
			<li>Placements: ".$this->numPlacements."</li>
			<li>Design: ".$this->designType."</li>
			<li>Color: ".$this->colorType."</li>
			<li>Inserts: ".$this->numInserts."</li>
	
	</td>

</tr>";
						
		return $html;
	}

}

?>