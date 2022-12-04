<?php

require "core.php";

$errors = '';

$minLength = 3;

// Search

if(getParamsQuery()){

$queryGet = clearGetData(getParamsQuery());

if(strlen($queryGet) >= $minLength){ 

$sqlQuery = "(SELECT movie_id as id, movie_slug as slug, movie_image as image, movie_title as title, movie_year as year, 'movie' as type FROM movies WHERE movie_title LIKE '%" . $queryGet . "%' OR movie_stars LIKE '%" . $queryGet . "%' AND movie_status = 1) UNION (SELECT serie_id as id, serie_slug as slug, serie_image as image, serie_title as title, serie_year as year, 'serie' as type FROM series WHERE serie_title LIKE '%" . $queryGet . "%' OR serie_stars LIKE '%" . $queryGet . "%' AND serie_status = 1)";


$sentence = $connect->prepare($sqlQuery);

$sentence->execute();

$qResults = $sentence->fetchAll(PDO::FETCH_ASSOC);
$totalResults = $sentence->rowCount();

if (empty($qResults)){
	
     $errors .='<div class="errors">'._NORESULTSFOUND.'</div>';
}

}else{

	$errors .='<div class="errors">'._YOUNEEDTOENTER.'</div>';

}

}else{

	$errors .='<div class="errors">'._NORESULTSFOUND.'</div>';

}


// Title

if(getParamsQuery()){

$queryGet = getParamsQuery();

$titleHeader = getTitle($connect, $queryGet);

}else{

$titleHeader = getTitle($connect, _SEARCHPAGETITLE);


}

require './header.php';
require './top.php';
require './views/search.view.php';
require './sidemenu.php';
require './bottom.php';
require './footer.php';

?>