<?php

require "core.php";

// Get Item Id

$idItem = clearGetData(getItemId());


if(empty($idItem)){

	header('Location: '. $urlPath->home());
}

// Movie Details

$itemDetails = getPageById($connect, $idItem);

if(empty($itemDetails)){
	
	header('Location: ' . $urlPath->error());
}

// Title

$titleHeader = getTitle($connect, $itemDetails['page_title']);


require './header.php';
require './top.php';
require './views/page.view.php';
require './sidemenu.php';
require './bottom.php';
require './footer.php';

?>