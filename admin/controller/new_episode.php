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
	header('Location: ' . _SITE_URL . '/admin/controller/error.php');
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

	$slug = convert_slug($episode_title);
	$exists = get_episode_slug($connect, $slug);

	if ($exists > 0)
	{
	    $new_number = $exists + 1;
	    $episode_slug = $slug."-".$new_number;

	}else{

	$episode_slug = convert_slug($episode_title);

	}

	$episode_image = $_FILES['episode_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["episode_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$episode_image_upload = '../../images/';

	move_uploaded_file($episode_image, $episode_image_upload . 'episode_' . $renamefile);

	$statment = $connect->prepare(
		"INSERT INTO episodes (episode_id,episode_title,episode_description,episode_serie,episode_link,episode_iframe, episode_status,episode_downloadable,episode_slug,episode_image,episode_date) VALUES (null, :episode_title, :episode_description, :episode_serie, :episode_link, :episode_iframe, :episode_status, :episode_downloadable, :episode_slug, :episode_image, CURRENT_TIMESTAMP)"
		);

	$statment->execute(array(

		':episode_title' => $episode_title,
		':episode_description' => $episode_description,
		':episode_serie' => $episode_serie,
		':episode_link' => $episode_link,
		':episode_iframe' => $episode_iframe,
		':episode_status' => $episode_status,
		':episode_downloadable' => $episode_downloadable,
		':episode_slug' => $episode_slug,
		':episode_image' => 'episode_' . $renamefile
		));

	header('Location:' . _SITE_URL . '/admin/controller/episodes.php');

}

$series = get_series($connect);

require '../views/new.episode.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
}
   
}else {
		header('Location: ./login.php');		
		}


?>