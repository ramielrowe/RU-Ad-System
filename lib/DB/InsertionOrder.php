<?php

require_once 'AdRep.php';
require_once 'Status.php';

class InsertionOrder {
	
	private $id;
	
	// Class AdRep
	private $adRep;
	
	// Class Client
	private $client;
	
	// Class InsertStatus
	private $status;
	
	// Class DesignStatus
	private $designStatus;
	
	// Class BillingStatus
	private $billingStatus;
	
	private $createdDate;
	private $lastUpdatedDate;
	private $insertDate;
	private $numColumns;
	private $height;
	private $numPlacements;
	private $design;
	private $color;
	private $numInserts;
	private $imageLoc;
	
	public function __construct($id, AdRep $adRep, Client $client, InsertStatus $status, DesignStatus $designStatus, BillingStatus $billingStatus, $createdDate, $lastUpdatedDate, $insertDate,
	$numColumns, $height, $numPlacements, $design, $color, $numInserts, $imageLoc){
	
		$this->id = $id;
		$this->adRep = $adRep;
		$this->client = $client;
		$this->status = $status;
		$this->designStatus = $designStatus;
		$this->billingStatus = $billingStatus;
		$this->createdDate =  $createdDate;
		$this->lastUpdatedDate = $lastUpdatedDate;
		$this->insertDate = $insertDate;
		$this->numColumns = $numColumns;
		$this->height = $height;
		$this->numPlacements = $numPlacements;
		$this->design = $design;
		$this->color = $color;
		$this->numInserts = $numInserts;
		$this->imageLoc = $imageLoc;
	
	}
	
	public function getID(){
		return $this->id;
	}
	
	public function getClient(){
		return $this->client;
	}
	
	public function getImageLoc(){
		return $this->imageLoc;
	}
	
	public function generateDualRowHTMLForAdRep(){
	
		$html = "
<tr>

	<td class=\"adrep\">".$this->client->generateTableCellHTMLWithEmail()."</td>
	<td class=\"created\">".$this->createdDate."</td>
	<td class=\"updated\">".$this->lastUpdatedDate."</td>
	<td class=\"issue\">".$this->insertDate."</td>
	<td class=\"status\">".$this->status->generateTableCellHTML()."</td>
	<td class=\"designstatus\">".$this->designStatus->generateTableCellHTML()."</td>
	<td class=\"billingstatus\">".$this->billingStatus->generateTableCellHTML()."</td>
	<td class=\"arrow\"><div class=\"arrow\"></div></td>

</tr>

<tr>

	<td colspan=\"8\">
	
		<a href=\"".$this->imageLoc."\" target=\"_blank\" class=\"preview\"><img src=\"./thumb.php?insertId=".$this->id."\"></a>
		<ul>
			<li>".$this->numColumns." Columns x ".$this->height." Inches</li>
			<li>Placements: ".$this->numPlacements."</li>
			<li>Design: ".$this->design."</li>
			<li>Color: ".$this->color."</li>
			<li>Inserts: ".$this->numInserts."</li>
	
	</td>

</tr>";
						
		return $html;
	}
	
	public function generateDualRowHTMLForClient(){
	
		$html = "
<tr>

	<td class=\"adrep\">".$this->adRep->generateTableCellHTMLWithEmail()."</td>
	<td class=\"created\">".$this->createdDate."</td>
	<td class=\"updated\">".$this->lastUpdatedDate."</td>
	<td class=\"issue\">".$this->insertDate."</td>
	<td class=\"status\">".$this->status->generateTableCellHTML()."</td>
	<td class=\"designstatus\">".$this->designStatus->generateTableCellHTML()."</td>
	<td class=\"billingstatus\">".$this->billingStatus->generateTableCellHTML()."</td>
	<td class=\"arrow\"><div class=\"arrow\"></div></td>

</tr>

<tr>

	<td colspan=\"8\">
	
		<a href=\"".$this->imageLoc."\" target=\"_blank\" class=\"preview\"><img src=\"./thumb.php?insertId=".$this->id."\"></a>
		<ul>
			<li>".$this->numColumns." Columns x ".$this->height." Inches</li>
			<li>Placements: ".$this->numPlacements."</li>
			<li>Design: ".$this->design."</li>
			<li>Color: ".$this->color."</li>
			<li>Inserts: ".$this->numInserts."</li>
	
	</td>

</tr>";
						
		return $html;
	}

}

?>