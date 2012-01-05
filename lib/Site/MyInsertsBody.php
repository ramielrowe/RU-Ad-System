<?php

require_once 'Page.php';
require_once './lib/DB/InsertionOrder.php';
require_once './lib/DB/AdRep.php';
require_once './lib/DB/Status.php';

class MyInsertsBody extends Body{

	
	public function getTitle(){
	
		return "My Insertions";
	
	}
	
	public function getScriptsHTML(){
	
		return "<script type=\"text/javascript\">  

			$(document).ready(function(){
			
				var pane = $('.scroll');
				pane.jScrollPane({
					horizontalGutter: -7,
					verticalGutter: -7,
					showArrows: false,
					hideFocus: true
				});
				var api = pane.data('jsp');
				
				$('.jspDrag').hide();
				$('.jspScrollable').mouseenter(function(){
					$('.jspDrag').fadeIn('slow');
				});
				$('.jspScrollable').mouseleave(function(){
					$('.jspDrag').fadeOut('slow');
				});
				$(\"#report tr:even\").addClass(\"odd\");
				$(\"#report tr:not(.odd)\").hide();
				//$(\"#report tr:first-child\").show();

				$(\"#report tr.odd\").click(function(){
					$(this).next(\"tr\").toggle();
					$(this).find(\".arrow\").toggleClass(\"up\");
					api.reinitialise();
				});
				
				api.reinitialise();
				
			});

		</script>";
	
	}

	public function generateHTML(){
	
		$adRep = new AdRep(1, "Andrew Melton", "apmelton@radford.edu", "804-267-0327");
		$status = new Status(1, "Design", "Your ad has been aproved and is being designed.");
		$designStatus = new Status(1, "To Be Designed", "A designer is working on your ad.");
		$billingStatus = new Status(1, "Paid", "");
	
		$insertion = new InsertionOrder($adRep, $status, $designStatus, $billingStatus,
		"9/20/2011", "9/26/2011", "9/27/2011", 2, 4, 2, "In-House", "CMYK", 0, "ball");
	
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
			
				<div id=\"contentdiv\" class=\"scroll\">
				
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