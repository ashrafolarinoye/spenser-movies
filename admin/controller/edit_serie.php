<?php 

/*--------------------*/
// App Name: MoFlix
// Description: MoFlix - Ultimate series Platform
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

	$serie_genre = cleardata($_POST['serie_genre']);
	$serie_title = cleardata($_POST['serie_title']);
	$serie_description = cleardataTextArea($_POST['serie_description']);
	$serie_year = cleardata($_POST['serie_year']);
	$serie_status = cleardata($_POST['serie_status']);
	$serie_featured = cleardata($_POST['serie_featured']);
	$serie_trailer = cleardata($_POST['serie_trailer']);
	$serie_stars = cleardata($_POST['serie_stars']);
	$serie_id = cleardata($_POST['serie_id']);
	$serie_image_save = $_POST['serie_image_save'];
	$serie_image = $_FILES['serie_image'];

	if (empty($serie_image['name'])) {
		$serie_image = $serie_image_save;
	} else{
			$imagefile = explode(".", $_FILES["serie_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$serie_image_upload = '../../images/';
		move_uploaded_file($_FILES['serie_image']['tmp_name'], $serie_image_upload . 'serie_' . $renamefile);
		$serie_image = 'serie_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE series SET serie_title = :serie_title, serie_description = :serie_description, serie_year = :serie_year, serie_status = :serie_status, serie_featured = :serie_featured, serie_trailer = :serie_trailer, serie_stars = :serie_stars, serie_image = :serie_image WHERE serie_id = :serie_id'
	);

$statment->execute(array(

		':serie_title' => $serie_title,
		':serie_description' => $serie_description,
		':serie_year' => $serie_year,
		':serie_status' => $serie_status,
		':serie_featured' => $serie_featured,
		':serie_trailer' => $serie_trailer,
		':serie_stars' => $serie_stars,
		':serie_image' => $serie_image,
		':serie_id' => $serie_id

		));

  $statment = $connect->prepare("DELETE FROM series_genres WHERE serie_id = :serie_id");
  $statment->bindParam(':serie_id',$serie_id);
  $statment->execute();

  $statment = $connect->prepare("INSERT INTO series_genres (genre_id,serie_id) VALUES (:genre_id, :serie_id)" );
  $statment->bindParam(':genre_id', $idgenre);
  $statment->bindParam(':serie_id', $serie_id);

  $statment->execute();

foreach ($serie_genre as $option_value)
{
   $idgenre = $option_value;
   $statment->execute();
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$id_serie = id_serie($_GET['id']);
    
if(empty($id_serie)){
	header('Location: ' . _SITE_URL . '/admin/controller/home.php');
	}

$serie = get_serie_per_id($connect, $id_serie);
    
    if (!$serie){
    header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$serie = $serie['0'];

}

$genres = get_genres($connect);
$selected_genres = selected_sgenres($connect);
$not_selected_genres = not_selected_sgenres($connect);

require '../views/edit.serie.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
} 
  
} else {
		header('Location: ./login.php');		
		}


?>