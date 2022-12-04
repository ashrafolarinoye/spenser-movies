<?php

require "core.php";

// Title

$titleHeader = getTitle($connect);

if (!isLogged()){

	header('Location: '. $urlPath->signin());

}else{

$userInfo = getUserInfo($connect);

// Get Movies Favorites
$userFavoritesMovies = getFavMoviesByUser($connect);

// Get Series Favorites
$userFavoritesSeries = getFavSeriesByUser($connect);

}


if (!isset($navigationSidebar)) {

// Get Sidebar Menu

$sidebarMenu = getSidebarMenu($connect);

$idMenu = $sidebarMenu['menu_id'];

$navigationSidebar = getNavigation($connect, $idMenu);

}

require './header.php';
require './top.php';
require './views/profile.view.php';
require './sidemenu.php';
require './bottom.php';
require './footer.php';

?>