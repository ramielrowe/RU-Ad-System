<?php

require_once "Page.php";
require_once "StandardLayout.php";
require_once "StandardNavigation.php";

SessionUtil::setVariable("user_level", 1);

$pageID = "home";

if(isset($_GET['pageid'])){
	$pageID = $_GET['pageid'];
}
else if(isset($_POST['pageid'])){
	$pageID = $_POST['pageid'];
}


$pageBody;

if($pageID == "home"){
	require_once 'HomeBody.php';
	$pageBody = new HomeBody();
}
else if($pageID == "myInserts"){
	require_once 'MyInsertsBody.php';
	$pageBody = new MyInsertsBody();
}
else{
	$pageID = "home";
	require_once 'HomeBody.php';
	$pageBody = new HomeBody();
}

$pageNavigation = new StandardNavigation($pageID);
$layout = new StandardLayout("Homepage", $pageNavigation, $pageBody);

$page = new Page(1, $layout);

$page->displayPage();

?>