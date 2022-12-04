<?php

/*--------------------*/
// App Name: MoFlix
// Description: MoFlix - Ultimate PHP Script For Movie & TV Shows
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
// Version: 1.00
/*--------------------*/

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

use voku\helper\AntiXSS;

require_once __DIR__ . '/../classes/anti-xss/autoload.php';

function connect($database){
    try{
        $connect = new PDO('mysql:host='.$database['host'].';dbname='.$database['db'],$database['user'],$database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function check_access($connect){
    $sentence = $connect->query("SELECT * FROM users WHERE user_email = '".$_SESSION['user_email']."' AND user_status = 1 LIMIT 1");
    $row = $sentence->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function echoOutput($data){
    $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
    return $data;
}

function cleardata($data){
    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function cleardataTextArea($data){

    $antiXss = new AntiXSS();
    $data = $antiXss->xss_clean($data);
    return $data;
}

function get_user_information($connect){
    $sentence = $connect->query("SELECT * FROM users WHERE user_email = '".$_SESSION['user_email']."' LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_movies($connect){

$sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id GROUP BY movies.movie_id ORDER BY movies.movie_date DESC LIMIT 8");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function get_all_movies($connect)
{
    
$sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id GROUP BY movies.movie_id ORDER BY movies.movie_date DESC");

    $sentence->execute();
    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function id_movie($id_movie){
    return (int)cleardata($id_movie);
}

function get_movie_per_id($connect, $id_movie){
    $sentence = $connect->query("SELECT SQL_CALC_FOUND_ROWS movies.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM movies JOIN movies_genres ON movies_genres.movie_id = movies.movie_id JOIN genres ON genres.genre_id = movies_genres.genre_id WHERE movies.movie_id = $id_movie GROUP BY movies.movie_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_movie_slug($connect, $slug){

$sentence = $connect->prepare("SELECT * FROM movies WHERE movie_slug = $slug");
$sentence->execute();
$row = $sentence->fetch(PDO::FETCH_ASSOC);
return $row[0];
}

function number_movies($connect){

$total_numbers = $connect->prepare("SELECT * FROM movies");
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function selected_mgenres($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare("SELECT genres.genre_title, genres.genre_id FROM genres JOIN movies_genres ON movies_genres.genre_id = genres.genre_id JOIN movies ON movies_genres.movie_id = ? GROUP BY movies_genres.genre_id");
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_mgenres($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare("SELECT genres.genre_title, genres.genre_id FROM genres WHERE genres.genre_id NOT IN (SELECT movies_genres.genre_id FROM movies_genres WHERE movies_genres.movie_id = ? GROUP BY movies_genres.genre_id)");
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function get_genres($connect){

$sentence = $connect->prepare("SELECT * FROM genres ORDER BY genre_id DESC LIMIT 8");
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_genres($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM genres ORDER BY genre_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_genre($id_genre){
    return (int)cleardata($id_genre);
}

function get_genre_per_id($connect, $id_genre){
    $sentence = $connect->query("SELECT * FROM genres WHERE genre_id = $id_genre LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_genres($connect){

$total_numbers = $connect->prepare("SELECT * FROM genres");
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_genre_slug($connect, $slug){

$sentence = $connect->prepare("SELECT * FROM genres WHERE genre_slug = $slug");
$sentence->execute();
$row = $sentence->fetch(PDO::FETCH_ASSOC);
return $row[0];
}

function get_pages($connect){

$sentence = $connect->prepare("SELECT * FROM pages ORDER BY page_date DESC LIMIT 8");
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_pages($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM pages ORDER BY page_date DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_page($id_page){
    return (int)cleardata($id_page);
}

function get_page_per_id($connect, $id_page){
    $sentence = $connect->query("SELECT * FROM pages WHERE pages.page_id = $id_page LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_pages($connect){

$total_numbers = $connect->prepare("SELECT * FROM pages");
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_page_slug($connect, $slug){

$sentence = $connect->prepare("SELECT * FROM pages WHERE page_slug = $slug");
$sentence->execute();
$row = $sentence->fetch(PDO::FETCH_ASSOC);
return $row[0];
}


function get_series($connect){

$sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS series.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM series JOIN series_genres ON series_genres.serie_id = series.serie_id JOIN genres ON genres.genre_id = series_genres.genre_id GROUP BY series.serie_id ORDER BY series.serie_date DESC LIMIT 8");
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_series($connect)
{
    
    $sentence = $connect->prepare("SELECT SQL_CALC_FOUND_ROWS series.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM series JOIN series_genres ON series_genres.serie_id = series.serie_id JOIN genres ON genres.genre_id = series_genres.genre_id GROUP BY series.serie_id ORDER BY series.serie_date DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_serie($id_serie){
    return (int)cleardata($id_serie);
}

function get_serie_per_id($connect, $id_serie){
    $sentence = $connect->query("SELECT SQL_CALC_FOUND_ROWS series.*, GROUP_CONCAT(genres.genre_title) AS genre_title FROM series JOIN series_genres ON series_genres.serie_id = series.serie_id JOIN genres ON genres.genre_id = series_genres.genre_id WHERE series.serie_id = $id_serie GROUP BY series.serie_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_serie_slug($connect, $slug){

$sentence = $connect->prepare("SELECT * FROM series WHERE serie_slug = $slug");
$sentence->execute();
$row = $sentence->fetch(PDO::FETCH_ASSOC);
return $row[0];
}

function number_series($connect){

$total_numbers = $connect->prepare("SELECT * FROM series");
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function selected_sgenres($connect){

if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare("SELECT genres.genre_title, genres.genre_id FROM genres JOIN series_genres ON series_genres.genre_id = genres.genre_id JOIN series ON series_genres.serie_id = ? GROUP BY series_genres.genre_id");
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function not_selected_sgenres($connect){

 if (isset($_GET['id']) && !empty($_GET['id'])) {

$id = intval($_GET['id']);

$sentence = $connect->prepare("SELECT genres.genre_title, genres.genre_id FROM genres WHERE genres.genre_id NOT IN (SELECT series_genres.genre_id FROM series_genres WHERE series_genres.serie_id = ? GROUP BY series_genres.genre_id)");
$sentence->execute([$id]);
return $sentence->fetchAll();

}}

function get_episodes($connect){

$sentence = $connect->prepare("SELECT episodes.*,series.serie_title AS serie_title,series.serie_id AS serie_id FROM episodes,series WHERE episodes.episode_serie = series.serie_id ORDER BY episode_date DESC LIMIT 8");
$sentence->execute(array());
return $sentence->fetchAll();

}

function get_all_episodes($connect)
{
    
    $sentence = $connect->prepare("SELECT episodes.*,series.serie_title AS serie_title,series.serie_id AS serie_id FROM episodes,series WHERE episodes.episode_serie = series.serie_id ORDER BY episode_date DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_episode($id_episode){
    return (int)cleardata($id_episode);
}

function get_episode_per_id($connect, $id_episode){
    $sentence = $connect->query("SELECT episodes.*,series.serie_title AS serie_title,series.serie_id AS serie_id FROM episodes,series WHERE episodes.episode_id = $id_episode AND episodes.episode_serie = series.serie_id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_episode_slug($connect, $slug){

$sentence = $connect->prepare("SELECT * FROM episodes WHERE episode_slug = $slug");
$sentence->execute();
$row = $sentence->fetch(PDO::FETCH_ASSOC);
return $row[0];
}

function number_episodes($connect){

$total_numbers = $connect->prepare("SELECT * FROM episodes");
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_all_strings($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM strings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_ads($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM ads ORDER BY id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_ad_per_id($connect, $id){
    $sentence = $connect->query("SELECT * FROM ads WHERE id = $id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

// MENUS ---------------------------------------

function get_all_menus($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM menus"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_menu($id_menu){
    return (int)cleardata($id_menu);
}

function get_menu_per_id($connect, $id_menu){
    $sentence = $connect->query("SELECT * FROM menus WHERE menu_id = $id_menu LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function get_navigations($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM navigations ORDER BY navigation_order ASC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_navigations_by_menu($connect, $id_menu)
{
    
    $sentence = $connect->prepare("SELECT * FROM navigations WHERE navigation_menu = '".$id_menu."' ORDER BY navigation_order ASC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_users($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM users ORDER BY user_id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_user($id_user){
    return (int)cleardata($id_user);
}

function get_user_per_id($connect, $id_user){
    $sentence = $connect->query("SELECT * FROM users WHERE user_id = $id_user LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_users($connect){

$total_numbers = $connect->prepare("SELECT * FROM users");
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

function get_settings($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_smtp($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM smtp"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_brand($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM brand"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function convert_slug($str, $options = array()) {
  // Make sure string is in UTF-8 and strip invalid UTF-8 characters
  $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
  
  $defaults = array(
    'delimiter' => '-',
    'limit' => null,
    'lowercase' => true,
    'replacements' => array(),
    'transliterate' => false,
  );
  
  // Merge options
  $options = array_merge($defaults, $options);
  
  $char_map = array(
    // Latin
    'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C', 
    'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 
    'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O', 
    'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH', 
    'ß' => 'ss', 
    'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c', 
    'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 
    'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o', 
    'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th', 
    'ÿ' => 'y',

    // Latin symbols
    '©' => '(c)',

    // Greek
    'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
    'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
    'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
    'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
    'Ϋ' => 'Y',
    'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
    'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
    'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
    'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
    'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',

    // Turkish
    'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
    'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g', 

    // Russian
    'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
    'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
    'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
    'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
    'Я' => 'Ya',
    'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
    'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
    'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
    'я' => 'ya',

    // Ukrainian
    'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
    'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',

    // Czech
    'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U', 
    'Ž' => 'Z', 
    'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
    'ž' => 'z', 

    // Polish
    'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z', 
    'Ż' => 'Z', 
    'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
    'ż' => 'z',

    // Latvian
    'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N', 
    'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
    'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
    'š' => 's', 'ū' => 'u', 'ž' => 'z'
  );
  
  // Make custom replacements
  $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
  
  // Transliterate characters to ASCII
  if ($options['transliterate']) {
    $str = str_replace(array_keys($char_map), $char_map, $str);
  }
  
  // Replace non-alphanumeric characters with our delimiter
  $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
  
  // Remove duplicate delimiters
  $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
  
  // Truncate slug to max. characters
  $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
  
  // Remove delimiter from ends
  $str = trim($str, $options['delimiter']);
  
  return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

function FormatDate($FormatDate){

    $timestamp = strtotime($FormatDate);
    $meses = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $anyo = date('Y', $timestamp);

    $FormatDate = "$dia " . $meses[$mes] . " $anyo";
    return $FormatDate;
}

?>