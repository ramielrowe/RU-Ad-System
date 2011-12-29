<?php

require_once "Layout.php";

class StandardLayout extends Layout{

	public function generateHTML(){

	$page = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" >

	<head>
	
		<title>".$this->getTitle()."</title>
		
		<style type=\"text/css\">
			@import url(\"button.css\");
		
			div::-webkit-scrollbar {
				width: 6px;
				height: 6px;
				padding: 18px;
				-webkit-border-radius: 1ex
			}

			div::-webkit-scrollbar-thumb {
				background-color: rgba(053,057,071,0.3);
				padding: 8px;
				width: 6px;
				height: 6px;
				-webkit-border-radius: 1ex;
			}

			div::-webkit-scrollbar-button:start:decrement,div::-webkit-scrollbar-button:end:increment {
				display: block;
				height: 10px
			}

			div::-webkit-scrollbar-thumb:vertical, div::-webkit-scrollbar-thumb:horizontal {
				height: 3px;
				width: 3px;
				margin: 3px;
			}
			
			body {background-image:url(backgradient.jpg);background-repeat:repeat;font-family:Arial, Helvetica, sans-serif; font-size:0.9em;}
			#body {margin-left:auto; margin-right: auto; background-color: #FFF; width: 1024px; height: 600px; border:thin #000000 solid;}
			#smadslogo {height: 120px; width: 120px; text-align: center;}
			#smadslogo img {width: 108px; height: 108px;}
			#header {font-family: Arial, Helvetica, sans-serif; vertical-align: center; text-align: center; height: 85px; font-size: 3.0em}
			#navi {vertical-align: center; text-align: center; height: 35px;}
			#content {vertical-align: top;}
			#insertsheader {width: 100%; overflow: scroll; overflow-x:hidden;}
			#contentdiv {width: 100%; height: 90%; overflow: scroll; overflow-x:hidden;}
			#report { border-collapse:collapse; width: 925px; margin-left: auto; margin-right: auto;}
			#report2 { border-collapse:collapse; width: 925px; margin-left: auto; margin-right: auto;}
			#report td.adrep {width: 250px;}
			#report td.created {width: 100px;}
			#report td.updated {width: 100px;}
			#report td.issue {width: 100px;}
			#report td.status {width: 100px;}
			#report td.designstatus {width: 205px;}
			#report td.billingstatus {width: 50px;}
			#report td.arrow {width: 1px;}
			#report2 th.adrep {width: 250px;}
			#report2 th.created {width: 100px;}
			#report2 th.updated {width: 100px;}
			#report2 th.issue {width: 100px;}
			#report2 th.status {width: 100px;}
			#report2 th.designstatus {width: 205px;}
			#report2 th.billingstatus {width: 73px;}
			#report td.adrep {text-align: center;}
			#report h4 { margin:0px; padding:0px;}
			#report img { float:right;}
			#report ul { margin:10px 0 10px 40px; padding:0px;}
			#report2 th { background:#7CB8E2 url(header_bkg.png) repeat-x scroll center left; color:#fff;  text-align:left; padding: 6px 10px; text-decoration:underline;}
			#report td { background:#C7DDEE none repeat-x scroll center left; color:#000;  padding: 6px 10px;}
			#report td.arrow{padding: 0px}
			#report tr.odd td { background:#fff url(row_bkg.png) repeat-x scroll center left; cursor:pointer; }
			#report div.arrow { background:transparent url(arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
			#report div.up { background-position:0px 0px;}
			A.info:link {color: #000;}
			A.info:visited {color: #000;}
			A.info:active {color: #000;}
			A.info:hover {color: #000;}

		</style>
		
		".$this->getBody()->getScriptsHTML()."
	
	</head>

	<body>
	
	<table id=\"body\" border=\"0\">
	
		<tr>
			<td id=\"smadslogo\" rowspan=\"2\"><img src=\"SMADslogo.gif\"/></td>
			<td id=\"header\">Student Media Advertising System</td>
		</tr>
		<tr>
		
			<td id=\"navi\">".$this->getNavigation()->generateHTML()."</td>
		
		</tr>
		<tr>
			<td id=\"content\" rowspan=\"2\" colspan=\"2\">".$this->getBody()->generateHTML()."</td>
		</tr>
	
	</table>
	
	</body>

</html>";
		
		return $page;
	
	}

}

?>