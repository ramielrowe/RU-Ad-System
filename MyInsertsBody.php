<?php

require_once 'Page.php';
require_once 'InsertionOrder.php';

class MyInsertsBody extends Body{

	public function getScriptsHTML(){
	
		return "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\" type=\"text/javascript\"></script>

		<script type=\"text/javascript\">  

			$(document).ready(function(){
				$(\"#report tr:even\").addClass(\"odd\");
				$(\"#report tr:not(.odd)\").hide();
				//$(\"#report tr:first-child\").show();

				$(\"#report tr.odd\").click(function(){
					$(this).next(\"tr\").toggle();
					$(this).find(\".arrow\").toggleClass(\"up\");
				});
			});

		</script>";
	
	}

	public function generateHTML(){
	
		$insertion = new InsertionOrder("Andrew Melton", "apmelton@radford.edu", "9/20/2011", "9/26/2011", "9/27/2011",
	"Design", "Your ad has been aproved and is being designed.", "To Be Designed", "A designer is working on your ad.", "Paid", "Payment has been recieved.",
	2, 4, 2, "In-House", "CMYK", 0, "ball");
	
		return "<br />
				<div id=\"insertsheader\">
				<table id=\"report2\" border=\"0\">
					<tr>
						
						<th class=\"adrep\">Your Ad Rep</th>
						<th class=\"created\">Created</th>
						<th class=\"updated\">Updated</th>
						<th class=\"issue\">Issue</th>
						<th class=\"status\">Status</th>
						<th class=\"designstatus\">Design-Status</th>
						<th class=\"billingstatus\">Billing</th>
						<!--<th class=\"arrow\"></th>-->
						
					</tr>
				</table>
				</div>
			
				<div id=\"contentdiv\">
				
					<table id=\"report\" border=\"0\">
						
						".$insertion->generateDualRowHTML()."
						".$insertion->generateDualRowHTML()."
						".$insertion->generateDualRowHTML()."
						".$insertion->generateDualRowHTML()."
						".$insertion->generateDualRowHTML()."
						".$insertion->generateDualRowHTML()."
						".$insertion->generateDualRowHTML()."
						".$insertion->generateDualRowHTML()."
						".$insertion->generateDualRowHTML()."
					
					</table>
				
				</div>";
	
	}

}

?>