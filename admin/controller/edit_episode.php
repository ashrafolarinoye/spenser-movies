<?php 

/*--------------------*/
// App Name: MoFlix
// Description: MoFlix - Ultimate episodes Platform
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

	$episode_title = cleardata($_POST['episode_title']);
	$episode_description = cleardataTextArea($_POST['episode_description']);
	$episode_serie = cleardata($_POST['episode_serie']);
	$episode_link = cleardata($_POST['episode_link']);
	$episode_iframe = $_POST['episode_iframe'];
	$episode_status = cleardata($_POST['episode_status']);
	$episode_downloadable = cleardata($_POST['episode_downloadable']);
	$episode_id = cleardata($_POST['episode_id']);
	$episode_image_save = $_POST['episode_image_save'];
	$episode_image = $_FILES['episode_image'];

	if (empty($episode_image['name'])) {
		$episode_image = $episode_image_save;
	} else{
			$imagefile = explode(".", $_FILES["episode_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$episode_image_upload = '../../images/';
		move_uploaded_file($_FILES['episode_image']['tmp_name'], $episode_image_upload . 'episode_' . $renamefile);
		$episode_image = 'episode_' . $renamefile;
	}

$statment = $connect->prepare(
	"UPDATE episodes SET episode_title = :episode_title, episode_description = :episode_description, episode_serie = :episode_serie, episode_link = :episode_link, episode_iframe = :episode_iframe, episode_status = :episode_status, episode_downloadable = :episode_downloadable, episode_image = :episode_image WHERE episode_id = :episode_id"
	);

$statment->execute(array(

		':episode_title' => $episode_title,
		':episode_description' => $episode_description,
		':episode_serie' => $episode_serie,
		':episode_link' => $episode_link,
		':episode_iframe' => $episode_iframe,
		':episode_status' => $episode_status,
		':episode_downloadable' => $episode_downloadable,
		':episode_image' => $episode_image,
		':episode_id' => $episode_id

		));

header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$id_episode = id_episode($_GET['id']);
    
if(empty($id_episode)){
	header('Location: ' . _SITE_URL . '/admin/controller/home.php');
	}

$episode = get_episode_per_id($connect, $id_episode);
    
    if (!$episode){
    header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$episode = $episode['0'];

}

$series = get_series($connect);

require '../views/edit.episode.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
} 

} else {
		header('Location: ./login.php');		
		}


?>