<?php

require "core.php";

$errors = '';

// Title

$titleHeader = getTitle($connect, _SERIESPAGETITLE);

// Genres

$rGenres = getSeriesGenres($connect);

// Year

$rYears = getSeriesYears($connect);

// Get All Series

$getSeries = getAllSeries($connect, $site_config['items_page']);

$qResults = $getSeries['items'];
$total = $getSeries['total'];

if (empty($qResults)){
	
     $errors .='<div class="errors">'._NODATAFOUND.'</div>';
}

// For Pagination

$numPages = numTotalPages($total, $site_config['items_page']);

require './header.php';
require './top.php';
require './views/series.view.php';
require './sidemenu.php';
require './bottom.php';
require './footer.php';

?>