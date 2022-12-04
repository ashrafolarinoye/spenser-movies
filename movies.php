<?php

require "core.php";

$errors = '';

// Title

$titleHeader = getTitle($connect, _MOVIESPAGETITLE);

// Genres

$rGenres = getMoviesGenres($connect);

// Year

$rYears = getMoviesYears($connect);

// Get All Movies

$getMovies = getAllMovies($connect, $site_config['items_page']);

$qResults = $getMovies['items'];
$total = $getMovies['total'];

if (empty($qResults)){
	
     $errors .='<div class="errors">'._NODATAFOUND.'</div>';
}

// For Pagination

$numPages = numTotalPages($total, $site_config['items_page']);

require './header.php';
require './top.php';
require './views/movies.view.php';
require './sidemenu.php';
require './bottom.php';
require './footer.php';

?>