<?php

class InsertionOrder {

	private $adRepName;
	private $adRepEmail;
	private $createdDate;
	private $lastUpdatedDate;
	private $issueDate;
	private $status;
	private $statusDesc;
	private $designStatus;
	private $designStatusDesc;
	private $billingStatus;
	private $billingStatusDesc;
	private $numColumns;
	private $width;
	private $numPlacements;
	private $designType;
	private $colorType;
	private $numInserts;
	private $imageName;
	
	public function __construct($adRepName, $adRepEmail, $createdDate, $lastUpdatedDate, $issueDate,
	$status, $statusDesc, $designStatus, $designStatusDesc, $billingStatus, $billingStatusDesc,
	$numColumns, $width, $numPlacements, $designType, $colorType, $numInserts, $imageName){
	
		$this->adRepName = $adRepName;
		$this->adRepEmail = $adRepEmail; 
		$this->createdDate =  $createdDate;
		$this->lastUpdatedDate = $lastUpdatedDate;
		$this->issueDate = $issueDate;
		$this->status = $status;
		$this->statusDesc = $statusDesc;
		$this->designStatus = $designStatus;
		$this->designStatusDesc = $designStatusDesc;
		$this->billingStatus = $billingStatus;
		$this->billingStatusDesc = $billingStatusDesc;
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

	<td class=\"adrep\"><a href=\"mailto:".$this->adRepEmail."\" class=\"info\" title=\"".$this->adRepEmail."\">".$this->adRepName."</a></td>
	<td class=\"created\">".$this->createdDate."</td>
	<td class=\"updated\">".$this->lastUpdatedDate."</td>
	<td class=\"issue\">".$this->issueDate."</td>
	<td class=\"status\"><a href=\"#\" title=\"".$this->statusDesc."\" class=\"info\">".$this->status."</a></td>
	<td class=\"designstatus\"><a href=\"#\" title=\"".$this->designStatusDesc."\" class=\"info\">".$this->designStatus."</a></td>
	<td class=\"billingstatus\"><a href=\"#\" title=\"".$this->billingStatusDesc."\" class=\"info\">".$this->billingStatus."</a></td>
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