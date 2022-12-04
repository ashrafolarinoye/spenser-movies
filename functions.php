<?php

/*--------------------*/
// App Name: MoFlix
// Description: MoFlix - Ultimate PHP Script For Movie & TV Shows
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
// Version: 1.00
/*--------------------*/

use voku\helper\AntiXSS;

require_once __DIR__ . '/classes/anti-xss/autoload.php';

function connect($database){
    try{
        $connect = new PDO('mysql:host='.$database['host'].';dbname='.$database['db'],$database['user'],$database['pass'], array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function isLogged(){

    if (isset($_SESSION['signedin']) && $_SESSION['signedin'] == true) {
        return true;
    }else{
        return false;
    }
}

function isAdmin($connect){

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    
    $sentence = $connect->prepare("SELECT * FROM users WHERE user_email = '".$emailSession."' AND user_status = 1 AND user_role = 1 LIMIT 1"); 
    $sentence->execute();
    $row = $sentence->fetch();

    if ($row) {
        
        return true;

    }else{

        return false;
    }

}

function echoOutput($data){
    $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
    return $data;
}

function clearData($data){
    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function clearGetData($data){

    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function getNumPage(){
    
    return isset($_GET['p']) && is_numeric($_GET['p']) ? $_GET['p'] : 1;
}

function getItemId(){
    
    return isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : NULL;
}

function isEditing(){
    
    return isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'edit';
}

function isWatch(){
    
    return isset($_GET['watch']) && !empty($_GET['watch']) && $_GET['watch'] == '1';
}

function isEpisode(){
    
    return isset($_GET['episode']) && !empty($_GET['episode']);
}

function getEpisodeId(){
    
    return isset($_GET['episode']) && is_numeric($_GET['episode']) ? $_GET['episode'] : NULL;
}

function getParamsTitle(){
    
    return isset($_GET['title']) && !empty($_GET['title']) ? $_GET['title'] : NULL;
}

function getParamsGenre(){
    
    return isset($_GET['genre']) && !empty($_GET['genre']) ? $_GET['genre'] : NULL;
}

function getParamsYear(){
    
    return isset($_GET['year']) && !empty($_GET['year']) ? $_GET['year'] : NULL;
}

function getParamsQuery(){
    
    return isset($_GET['query']) && !empty($_GET['query']) ? $_GET['query'] : NULL;
}

function getFullUrl(){

    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    return htmlspecialchars($url);

}

function getCurrentUrl(){
    
    
    $url = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

    return $url;
}

function gotToWatch(){
    
    $url = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

    return htmlspecialchars($url.'?watch=1');
}

function gotToWatchEpisode($episodeId){
    
    $url = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

    return htmlspecialchars($url.'?watch=1&episode='.$episodeId);
}

function goToPage($parameter, $value) { 
    $params = array(); 
    $output = "?"; 
    $firstRun = true; 
    foreach($_GET as $key=>$val) { 
        if($key != $parameter) { 
            if(!$firstRun) { 
                $output .= "&"; 
            } else { 
                $firstRun = false; 
            } 
            $output .= $key."=".urlencode($val); 
        } 
    } 

    if(!$firstRun) 
        $output .= "&"; 
    $output .= $parameter."=".urlencode($value); 
    return htmlentities($output); 
} 

function formatDate($FormatDate){

    $timestamp = strtotime($FormatDate);
    $mouthes = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $day = date('d', $timestamp);
    $mouth = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    $FormatDate = "$day " . $mouthes[$mouth] . " $year";
    return $FormatDate;
}

function generatePassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

function maskEmail($email)
{
    $mail_parts = explode('@', $email);
    $username = '@'.$mail_parts[0];
    $len = strlen($username);

    return $username;
}

function showStars($value){

    for($i = 0; $i < 10; $i++){
        if($i < $value){
            echo "<i class='ion-ios-star star'></i>";
        } else {
            echo "<i class='ion-ios-star star-o'></i>";
        }
    }
}

function showRating($value){

    if ($value) {
        $num = round($value, 1).'<span>/10</span>';
    }else{
        $num = '-<span>/10</span>';
    }
    return $num;
}

function showOrder($value){

    $num = $value+1;
    $output = $num.'&ordm;';

    return $output;
}

/*------------------------------------------------------------ */
/* ADS */
/*------------------------------------------------------------ */

function getHeaderAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE position = 'header' AND status = 1"); 
    $sentence->execute();
    $row = $sentence->fetch();
    return $row['content'];

}

function getFooterAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE position = 'footer' AND status = 1"); 
    $sentence->execute();
    $row = $sentence->fetch();
    return $row['content'];

}

function getSidebarAd($connect){
    
    $sentence = $connect->prepare("SELECT * FROM ads WHERE position = 'sidebar' AND status = 1"); 
    $sentence->execute();
    $row = $sentence->fetch();
    return $row['content'];

}

/*------------------------------------------------------------ */
/* REVIEWS */
/*------------------------------------------------------------ */


function getUserReviewByMovie($itemId, $connect){

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);

    $sentence = $connect->query("SELECT * FROM movies_reviews WHERE user = '".$emailSession."' AND item = $itemId LIMIT 1");
    $sentence->execute();
    return $sentence->fetch();
}

function ReviewsByMovie($itemId, $connect){
    $sentence = $connect->prepare("SELECT * FROM movies_reviews WHERE item = $itemId ORDER BY published DESC");
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getUserReviewBySerie($itemId, $connect){

    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);

    $sentence = $connect->query("SELECT * FROM series_reviews WHERE user = '".$emailSession."' AND item = $itemId LIMIT 1");
    $sentence->execute();
    return $sentence->fetch();
}

function ReviewsBySerie($itemId, $connect){
    $sentence = $connect->prepare("SELECT * FROM series_reviews WHERE item = $itemId ORDER BY published DESC");
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

/*------------------------------------------------------------ */
/* USERS */
/*------------------------------------------------------------ */

function getUserInfo($connect){
    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);

    $sentence = $connect->prepare("SELECT * FROM users WHERE user_email = '".$emailSession."' LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getGravatar( $email, $s = 150, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}


/*------------------------------------------------------------ */
/* SITE */
/*------------------------------------------------------------ */


function getTitle($connect, $pageTitle = NULL){

    $separator = ' - ';

    if ($pageTitle == NULL) {
        
        $sentence = $connect->prepare("SELECT st_sitename FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();
        return $row['st_sitename'];

    } else {

        $sentence = $connect->prepare("SELECT st_sitename FROM settings");
        $sentence->execute();
        $row = $sentence->fetch();

        return $row['st_sitename'] . $separator . $pageTitle;
        
    }

}

function getSettings($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getSmtp($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM smtp"); 
    $sentence->execute();
    return $sentence->fetch();
}

function getBrand($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM brand"); 
    $sentence->execute();
    return $sentence->fetch();
}

/*------------------------------------------------------------ */
/* PAGES */
/*------------------------------------------------------------ */

function getPageById($connect, $idItem)
{

    $sentence = $connect->prepare("SELECT * FROM pages WHERE page_id = $idItem LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

/*------------------------------------------------------------ */
/* CATEGORIES */
/*------------------------------------------------------------ */

function getGenreById($connect, $idItem)
{

    $sentence = $connect->prepare("SELECT * FROM genres WHERE genre_id = $idItem LIMIT 1");
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

/*------------------------------------------------------------ */
/* FAVORITES */
/*------------------------------------------------------------ */

function getFavMoviesByUser($connect){
    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    $sentence = $connect->prepare("SELECT movies_favorites.*, movie_title AS title, movie_slug AS slug, movie_image AS image FROM movies_favorites LEFT JOIN movies ON movies.movie_id = movies_favorites.item WHERE user = '".$emailSession."'");
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getFavSeriesByUser($connect){
    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    $sentence = $connect->prepare("SELECT series_favorites.*, serie_title AS title, serie_slug AS slug, serie_image AS image FROM series_favorites LEFT JOIN series ON series.serie_id = series_favorites.item WHERE user = '".$emailSession."'");
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getFavByMovie($connect, $itemId){
    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    $sentence = $connect->query("SELECT * FROM movies_favorites WHERE user = '".$emailSession."' AND item = $itemId LIMIT 1");
    $sentence = $sentence->fetch();
    return ($sentence) ? true : false;
}

function getFavBySerie($connect, $itemId){
    $emailSession = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    $sentence = $connect->query("SELECT * FROM series_favorites WHERE user = '".$emailSession."' AND item = $itemId LIMIT 1");
    $sentence = $sentence->fetch();
    return ($sentence) ? true : false;
}

/*------------------------------------------------------------ */
/* MOVIES */
/*------------------------------------------------------------ */


function getMovieById($connect, $idItem)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title, AVG(rating) AS movie_rate, movies.movie_id AS id, movies.movie_link AS link, movies.movie_iframe AS iframe, movies.movie_trailer AS trailer, movies.movie_title AS title, movies.movie_description AS description  FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id LEFT JOIN movies_reviews ON movies_reviews.item = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_id = $idItem AND movies.movie_status = 1 GROUP BY movies.movie_id LIMIT 1");

    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getMoviesStarsByMovie($connect, $idItem)
{
    
    $sentence = $connect->prepare("SELECT movie_stars AS stars FROM movies WHERE movie_id = $idItem ORDER BY movie_stars ASC");
    $sentence->execute();
    $result = $sentence->fetch()['stars'];
    return $result;

}

function getMoviesGenresByMovie($connect, $idItem)
{
    
    $sentence = $connect->prepare("SELECT genre_title AS genre FROM genres WHERE genre_id IN (SELECT genre_id FROM movies_genres WHERE movie_id = $idItem)");
    $sentence->execute();
    $result = $sentence->fetch()['genre'];
    return $result;

}

function getMoviesGenres($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM genres WHERE genre_id IN (SELECT genre_id FROM movies_genres GROUP BY genre_id) ORDER BY genre_title ASC");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getMoviesYears($connect)
{
    
    $sentence = $connect->prepare("SELECT movie_year AS year FROM movies GROUP BY movie_year ORDER BY movie_year ASC");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getFeaturedMovies($connect, $limit)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title, AVG(rating) AS movie_rate FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id LEFT JOIN movies_reviews ON movies_reviews.item = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_featured = 1 AND movies.movie_status = 1 GROUP BY movies.movie_id ORDER BY movies.movie_date DESC LIMIT $limit");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getAllMovies($connect, $itemsPage)
{

$limit = (getNumPage() > 1) ? getNumPage() * $itemsPage - $itemsPage : 0;

$sqlQuery = "SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_status = 1";

// Filter By Title

if(getParamsTitle()){

$titleGet = getParamsTitle();
$sqlQuery .= " AND movies.movie_title LIKE '%".$titleGet."%' OR movies.movie_stars LIKE '%".$titleGet."%'";

}

// Filter By Year

if(getParamsYear() && getParamsYear() !== "any"){

$yearGet = getParamsYear();
$sqlQuery .= " AND movies.movie_year = '".$yearGet."'";

}

// Filter By Genre

if(getParamsGenre() && getParamsGenre() !== "any"){

$genreGet = getParamsGenre();
$sqlQuery .= " AND movies.movie_id IN (SELECT movie_id FROM movies_genres WHERE genre_id = $genreGet)";

}

$sqlQuery .= " GROUP BY movies.movie_id ORDER BY movies.movie_date DESC";

$sqlQuery .= " LIMIT $limit, $itemsPage";

$sentence = $connect->prepare($sqlQuery);

$sentence->execute();

$total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();

$items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);

}

function getRecentMovies($connect, $limit = NULL)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_status = 1 GROUP BY movies.movie_id ORDER BY movies.movie_date DESC LIMIT $limit");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getTopMovies($connect, $limit = NULL)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, AVG(rating) AS movie_rate FROM movies JOIN movies_reviews ON movies_reviews.item = movies.movie_id WHERE movies.movie_status = 1 GROUP BY movies.movie_id ORDER BY movie_rate DESC LIMIT $limit");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function numTotalPages($total_items, $items_page){

    $numPages = ceil($total_items / $items_page);
    return $numPages;
}

/*------------------------------------------------------------ */
/* SERIES */
/*------------------------------------------------------------ */


function getSerieById($connect, $idItem)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS series.*, GROUP_CONCAT(genres.genre_title) AS genre_title, AVG(rating) AS serie_rate, series.serie_id AS id, series.serie_trailer AS trailer, series.serie_title AS title, series.serie_description AS description FROM series JOIN series_genres ON series_genres.serie_id = series.serie_id LEFT JOIN series_reviews ON series_reviews.item = series.serie_id JOIN genres ON genres.genre_id = series_genres.genre_id WHERE series.serie_id = $idItem AND series.serie_status = 1 GROUP BY series.serie_id LIMIT 1");

    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function getEpisodesBySerie($idItem, $connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM episodes WHERE episode_serie = $idItem AND episode_status = 1 ORDER BY episode_title ASC");
    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);

}

function getSeriesStarsBySerie($connect, $idItem)
{
    
    $sentence = $connect->prepare("SELECT serie_stars AS stars FROM series WHERE serie_id = $idItem ORDER BY serie_stars ASC");
    $sentence->execute();
    $result = $sentence->fetch()['stars'];
    return $result;

}

function getSeriesGenresBySerie($connect, $idItem)
{
    
    $sentence = $connect->prepare("SELECT genre_title AS genre FROM genres WHERE genre_id IN (SELECT genre_id FROM series_genres WHERE serie_id = $idItem)");
    $sentence->execute();
    $result = $sentence->fetch()['genre'];
    return $result;

}

function getSeriesGenres($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM genres WHERE genre_id IN (SELECT genre_id FROM series_genres GROUP BY genre_id) ORDER BY genre_title ASC");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getSeriesYears($connect)
{
    
    $sentence = $connect->prepare("SELECT serie_year AS year FROM series GROUP BY serie_year ORDER BY serie_year ASC");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getAllSeries($connect, $itemsPage)
{

$limit = (getNumPage() > 1) ? getNumPage() * $itemsPage - $itemsPage : 0;

$sqlQuery = "SELECT SQL_CALC_FOUND_ROWS series.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM series JOIN series_genres ON series_genres.serie_id = series.serie_id JOIN genres ON genres.genre_id = series_genres.genre_id WHERE  series.serie_status = 1";


// Filter By Title

if(getParamsTitle()){

$titleGet = getParamsTitle();
$sqlQuery .= " AND series.serie_title LIKE '%".$titleGet."%' OR series.serie_stars LIKE '%".$titleGet."%'";

}

// Filter By Year

if(getParamsYear() && getParamsYear() !== "any"){

$yearGet = getParamsYear();
$sqlQuery .= " AND series.serie_year = '".$yearGet."'";

}

// Filter By Genre

if(getParamsGenre() && getParamsGenre() !== "any"){

$genreGet = getParamsGenre();
$sqlQuery .= " AND series.serie_id IN (SELECT serie_id FROM series_genres WHERE genre_id = $genreGet)";

}

$sqlQuery .= " GROUP BY series.serie_id ORDER BY series.serie_date DESC";

$sqlQuery .= " LIMIT $limit, $itemsPage";

$sentence = $connect->prepare($sqlQuery);

$sentence->execute();

$total = $connect->query("SELECT FOUND_ROWS()")->fetchColumn();

$items = $sentence->fetchAll(PDO::FETCH_ASSOC);

    return array('items' => $items, 'total' => $total);

}

function getFeaturedSeries($connect, $limit = NULL)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS series.*, GROUP_CONCAT(genres.genre_title) AS genre_title, AVG(rating) AS serie_rate FROM series JOIN series_genres ON series_genres.serie_id = series.serie_id LEFT JOIN series_reviews ON series_reviews.item = series.serie_id JOIN genres ON genres.genre_id = series_genres.genre_id WHERE series.serie_featured = 1 AND series.serie_status = 1 GROUP BY series.serie_id ORDER BY series.serie_date DESC LIMIT $limit");


    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getRecentSeries($connect, $limit = NULL)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS series.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM series JOIN series_genres ON series_genres.serie_id = series.serie_id JOIN genres ON genres.genre_id = series_genres.genre_id WHERE series.serie_status = 1 GROUP BY series.serie_id ORDER BY series.serie_date DESC LIMIT $limit");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getTopSeries($connect, $limit = NULL)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS series.*, AVG(rating) AS serie_rate FROM series JOIN series_reviews ON series_reviews.item = series.serie_id WHERE series.serie_status = 1 GROUP BY series.serie_id ORDER BY serie_rate DESC LIMIT $limit");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getEpisodeById($connect, $idItem)
{

    $sentence = $connect->prepare("SELECT * FROM episodes WHERE episode_id = $idItem LIMIT 1");
    $sentence->execute();
    $row = $sentence->fetch();
    return $row;
}

function numTotalSeries($items_page, $connect){

    $total_items = $connect->prepare("SELECT COUNT(*) AS total FROM series");
    $total_items->execute();
    $total_items = $total_items->fetch()['total'];
    $numPages = ceil($total_items / $items_page);
    return $numPages;
}

/*------------------------------------------------------------ */
/* MENUS */
/*------------------------------------------------------------ */

function getHeaderMenu($connect)
{
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_header = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getFooterMenu($connect)
{
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_footer = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getSidebarMenu($connect)
{
    
    $q = $connect->query("SELECT * FROM menus WHERE menu_sidebar = 1 AND menu_status = 1 ORDER BY menu_id DESC LIMIT 1");
    $f = $q->fetch();
    $result = $f;
    return $result;
}

function getNavigation($connect, $idMenu)
{
    
    $sentence = $connect->prepare("SELECT * FROM navigations WHERE navigation_menu = '".$idMenu."' ORDER BY navigation_order ASC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

?>