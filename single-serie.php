<?php

require "core.php";

// Get Item Id

$idItem = clearGetData(getItemId());


if(empty($idItem)){

	header('Location: '. $urlPath->home());
}

// Serie Details

$itemDetails = getSerieById($connect, $idItem);

if(empty($itemDetails)){
	
	header('Location: '. $urlPath->error());
}

// Stars by Serie

$getSerieStars = getSeriesStarsBySerie($connect, $idItem);

$serieStars = explode(',', $getSerieStars);


// Genres by Serie

$getSerieGenres = getSeriesGenresBySerie($connect, $idItem);

$serieGenres = explode(',', $getSerieGenres);


// Title

$titleHeader = getTitle($connect, $itemDetails['serie_title']);

// Get All Reviews By Serie

$getReviews = ReviewsBySerie($idItem, $connect);


// Get Episodes

$serieEpisodes = getEpisodesBySerie($idItem, $connect);

if (isLogged()) {

// Check if user have already posted a review for the serie
	
$isReviewed = getUserReviewBySerie($idItem, $connect);

// Check if user have saved the item into favorites

$isInFavorites = getFavBySerie($connect, $idItem);

}



require './header.php';
require './top.php';
require './views/single-serie.view.php';
require './sidemenu.php';
require './bottom.php';
require './footer.php';

?>