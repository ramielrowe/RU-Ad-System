<?php

require_once './Config.php';

require_once './lib/Site/Page.php';
require_once './lib/Site/StandardLayout.php';
require_once './lib/Site/StandardNavigation.php';

require_once './lib/Util/Context.php';
require_once './lib/Util/SessionUtil.php';

if(!SessionUtil::start())
	echo "Error Starting Session";

$context = new Context();
$context->setPageID("home");

if(isset($_GET['pageid'])){
	$context->setPageID($_GET['pageid']);
}
else if(isset($_POST['pageid'])){
	$context->setPageID($_POST['pageid']);
}

if(isset($_POST['action'])){

	$action = $_POST['action'];
	
	if($context->getPageID() == "login"){
	
		require_once './lib/Form/LoginHandler.php';
		$loginHandler = new LoginHandler();
		$loginHandler->handleForm($context, $action);
	
	}
	else if($context->getPageID() == "register"){
	
		require_once './lib/Form/RegisterHandler.php';
		$registerHandler = new RegisterHandler();
		$registerHandler->handleForm($context, $action);
	
	}

}

if(!SessionUtil::isLoggedIn() && $context->getPageID() != "register"){
	$context->setPageID("login");
}

$pageBody;

if($context->getPageID() == "home"){
	require_once './lib/Site/HomeBody.php';
	$pageBody = new HomeBody();
}
else if($context->getPageID() == "login"){
	require_once './lib/Site/LoginBody.php';
	$pageBody = new LoginBody($context);
}
else if($context->getPageID() == "register"){
	require_once './lib/Site/RegisterBody.php';
	$pageBody = new RegisterBody($context);
}
else if($context->getPageID() == "logout"){
	SessionUtil::restart();
	$context->setPageID("login");
	require_once './lib/Site/LoginBody.php';
	$pageBody = new LoginBody($context);
}
else if($context->getPageID() == "myInserts"){
	require_once './lib/Site/MyInsertsBody.php';
	$pageBody = new MyInsertsBody();
}
else if($context->getPageID() == "myAccount"){
	require_once './lib/Site/MyAccountBody.php';
	$pageBody = new MyAccountBody();
}
else{
	$context->setPageID("home");
	require_once './lib/Site/HomeBody.php';
	$pageBody = new HomeBody();
}

$pageNavigation = new StandardNavigation($context);
$layout = new StandardLayout($pageNavigation, $pageBody);

$page = new Page(0, $layout);

$page->displayPage();

?>