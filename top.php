<?php

// Get Menu Header

$headerMenu = getHeaderMenu($connect);

$idMenu = $headerMenu['menu_id'];

$navigationHeader = getNavigation($connect, $idMenu);

// Social Media Links

$arraysm[] = array($settings['st_facebook'], $settings['st_twitter'], $settings['st_youtube'], $settings['st_instagram']);


// Get user info

if (isLogged()){

$userInfo = getUserInfo($connect);

}

// Get Header Ad

$headerAd = getHeaderAd($connect);

require './views/top.view.php';

?>