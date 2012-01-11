<?php

require_once 'lib/DB/DesignStatus.php';
require_once 'lib/DB/InsertStatus.php';

class CreateInsertBody extends Body{

	private $context;

	public function __construct(Context $context){

		$this->context = $context;

	}

	public function getTitle(){

		return "";

	}

	public function getScriptsHTML(){

		return "<script type=\"text/javascript\">
			$(document).ready(function(){
				$('.date').datepicker();
			})
		</script>";

	}

	public function generateHTML(){

		return $this->context->getErrorHTML()."<div class=\"centered\" style=\"width: 45%\">
		<form action=\"index.php?pageid=createInsertion\" method=\"POST\" enctype=\"multipart/form-data\">
		<div style=\"float: left; text-align: left;\">
			<label for=\"insertdate\" class=\"above\">Insert Date</label>
			<input type=\"text\" readonly name=\"insertdate\" placeholder=\"Insert Date\" class=\"bluefocus text date\"\><br />
			<label for=\"design\" class=\"above\">Design</label>
			<select name=\"design\" id=\"design\" class=\"bluefocus\">
				<option value=\"In-House\">In-House</option>
				<option value=\"Client\">Client Provided</option>
			</select>
			<label for=\"color\" class=\"above\">Color (CMYK)</label>
			<input type=\"text\" name=\"color\" placeholder=\"Color\" class=\"bluefocus text\"\>
			<label for=\"selectimage\" class=\"above\">&nbsp;</label>
			<input type=\"button\" name=\"selectimage\" value=\"Select Sample Image\" onclick=\"javascript:$('#sampleimage').show();$('#sampleimage').focus();$('#sampleimage').click();$('#sampleimage').hide();\" class=\"stdbutton bluefocus\">
			<input type=\"submit\" value=\"Create\" class=\"stdbutton bluefocus\" />
		</div>
		<div style=\"float: right; text-align: right;\">
			<label for=\"colums\" class=\"above\">Columns</label>
			<input type=\"text\" name=\"columns\" placeholder=\"Columns\" class=\"bluefocus text\"\><br />
			<label for=\"height\" class=\"above\">Height (Inches)</label>
			<input type=\"text\" name=\"height\" placeholder=\"Height\" class=\"bluefocus text\"\><br />
			<label for=\"inserts\" class=\"above\">Number of Inserts</label>
			<input type=\"text\" name=\"inserts\" placeholder=\"Inserts\" class=\"bluefocus text\"\><br />
			<label for=\"inserts\" class=\"above\">Number of Placements</label>
			<input type=\"text\" name=\"placements\" placeholder=\"Placements\" class=\"bluefocus text\"\><br />
		</div>
		<input type=\"hidden\" name=\"action\" value=\"clientCreateInsertion\" />
		<input type=\"file\" name=\"sampleimage\" id=\"sampleimage\" style=\"visibility: hidden; display: none;\" />
		</form>
		
		</div>"; 

	}

}

?>