<?php

require "core.php";

// Title

$titleHeader = getTitle($connect);

// Featured Movies

$featuredMovies = getFeaturedMovies($connect, $site_config['items_featured']);

// Recent Movies

$recentMovies = getRecentMovies($connect, $site_config['items_recent']);


// Featured Series

$featuredSeries = getFeaturedSeries($connect, $site_config['items_featured']);

// Recent Series

$recentSeries = getRecentSeries($connect, $site_config['items_recent']);

require './header.php';
require './top.php';
require './views/index.view.php';
require './sidemenu.php';
require './bottom.php';
require './footer.php';

?>