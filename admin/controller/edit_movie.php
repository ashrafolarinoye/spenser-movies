<?php 

/*--------------------*/
// App Name: MoFlix
// Description: MoFlix - Ultimate PHP Script For Movie & TV Shows
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
// Version: 1.00
/*--------------------*/

session_start();
if (isset($_SESSION['user_email'])){
    
    
require '../../config.php';
require '../functions.php';
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	header ('Location: ' . _SITE_URL . '/admin/controller/error.php');
	}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$movie_genre = $_POST['movie_genre'];

	$movie_title = cleardata($_POST['movie_title']);
	$movie_description = cleardataTextArea($_POST['movie_description']);
	$movie_year = cleardata($_POST['movie_year']);
	$movie_duration = cleardata($_POST['movie_duration']);
	$movie_trailer = cleardata($_POST['movie_trailer']);
	$movie_link = cleardata($_POST['movie_link']);
	$movie_status = cleardata($_POST['movie_status']);
	$movie_downloadable = cleardata($_POST['movie_downloadable']);
	$movie_stars = cleardata($_POST['movie_stars']);
	$movie_iframe = $_POST['movie_iframe'];
	$movie_featured = cleardata($_POST['movie_featured']);
	$movie_id = cleardata($_POST['movie_id']);
	$movie_image_save = $_POST['movie_image_save'];
	$movie_image = $_FILES['movie_image'];

	if (empty($movie_image['name'])) {
		$movie_image = $movie_image_save;
	} else{
			$imagefile = explode(".", $_FILES["movie_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$movie_image_upload = '../../images/';
		move_uploaded_file($_FILES['movie_image']['tmp_name'], $movie_image_upload . 'movie_' . $renamefile);
		$movie_image = 'movie_' . $renamefile;
	}

$statment = $connect->prepare(
	"UPDATE movies SET movie_title = :movie_title, movie_description = :movie_description, movie_year = :movie_year, movie_duration = :movie_duration, movie_trailer = :movie_trailer, movie_link = :movie_link, movie_status = :movie_status, movie_downloadable = :movie_downloadable, movie_stars = :movie_stars, movie_iframe = :movie_iframe, movie_featured = :movie_featured, movie_image = :movie_image WHERE movie_id = :movie_id"
	);

$statment->execute(array(

		':movie_title' => $movie_title,
		':movie_description' => $movie_description,
		':movie_year' => $movie_year,
		':movie_duration' => $movie_duration,
		':movie_trailer' => $movie_trailer,
		':movie_link' => $movie_link,
		':movie_status' => $movie_status,
		':movie_downloadable' => $movie_downloadable,
		':movie_stars' => $movie_stars,
		':movie_iframe' => $movie_iframe,
		':movie_featured' => $movie_featured,
		':movie_image' => $movie_image,
		':movie_id' => $movie_id

		));

  $statment = $connect->prepare("DELETE FROM movies_genres WHERE movie_id = :movie_id");
  $statment->bindParam(':movie_id',$movie_id);
  $statment->execute();

  $statment = $connect->prepare("INSERT INTO movies_genres (genre_id,movie_id) VALUES (:genre_id, :movie_id)" );
  $statment->bindParam(':genre_id', $idgenre);
  $statment->bindParam(':movie_id', $movie_id);

  $statment->execute();

foreach ($movie_genre as $option_value)
{
   $idgenre = $option_value;
   $statment->execute();
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$id_movie = id_movie($_GET['id']);
    
if(empty($id_movie)){
	header('Location: ' . _SITE_URL . '/admin/controller/home.php');
	}

$movie = get_movie_per_id($connect, $id_movie);
    
    if (!$movie){
    header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$movie = $movie['0'];

}

$genres = get_genres($connect);
$selected_genres = selected_mgenres($connect);
$not_selected_genres = not_selected_mgenres($connect);

require '../views/edit.movie.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
} 
 
} else {
		header('Location: ./login.php');		
		}


?>