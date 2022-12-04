<?php


// Get Top Movies

$topMovies = getTopMovies($connect, 5);

// Get Top Series

$topSeries = getTopSeries($connect, 5);

// Get Sidebar Ad

$sidebarAd = getSidebarAd($connect);

// Movies Genres

$moviesGenres = getMoviesGenres($connect);

// Series Genres

$seriesGenres = getSeriesGenres($connect);

// Get Sidebar Menu

$sidebarMenu = getSidebarMenu($connect);

$idMenu = $sidebarMenu['menu_id'];

$navigationSidebar = getNavigation($connect, $idMenu);

require './views/sidebar.view.php';

?>