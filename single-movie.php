<?php

require "core.php";

// Get Item Id

$idItem = clearGetData(getItemId());


if(empty($idItem)){

	header('Location: '. $urlPath->home());
}

// Movie Details

$itemDetails = getMovieById($connect, $idItem);

if(empty($itemDetails)){
	
	header('Location: '. $urlPath->error());
}

// Stars by Movie

$getMovieStars = getMoviesStarsByMovie($connect, $idItem);

$movieStars = explode(',', $getMovieStars);


// Genres by Movie

$getMovieGenres = getMoviesGenresByMovie($connect, $idItem);

$movieGenres = explode(',', $getMovieGenres);


// Title

$titleHeader = getTitle($connect, $itemDetails['movie_title']);

// Get All Reviews By Movie

$getReviews = ReviewsByMovie($idItem, $connect);


if (isLogged()) {

// Check if user have already posted a review for the movie
	
$isReviewed = getUserReviewByMovie($idItem, $connect);

// Check if user have saved the item into favorites

$isInFavorites = getFavByMovie($connect, $idItem);

}



require './header.php';
require './top.php';
require './views/single-movie.view.php';
require './sidemenu.php';
require './bottom.php';
require './footer.php';

?>