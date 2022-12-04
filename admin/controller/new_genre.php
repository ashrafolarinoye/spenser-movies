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
	header('Location: ' . _SITE_URL . '/admin/controller/error.php');
	} 

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$genre_title = cleardata($_POST['genre_title']);

	$slug = convert_slug($genre_title);
	$exists = get_page_slug($connect, $slug);

	if ($exists > 0)
	{
	    $new_number = $exists + 1;
	    $genre_slug = $slug."-".$new_number;

	}else{

	$genre_slug = convert_slug($genre_title);

	}

	$genre_image = $_FILES['genre_image']['tmp_name'];

	$imagefile = explode(".", $_FILES["genre_image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$genre_image_upload = '../../images/';

	move_uploaded_file($genre_image, $genre_image_upload . 'genre_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO genres (genre_id,genre_title,genre_slug,genre_image) VALUES (null, :genre_title, :genre_slug, :genre_image)'
		);

	$statment->execute(array(
		':genre_title' => $genre_title,
		':genre_slug' => $genre_slug,
		':genre_image' => 'genre_' . $renamefile
		));

	header('Location:' . _SITE_URL . '/admin/controller/genres.php');

}

require '../views/new.genre.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
}
  
}else {
		header('Location: ./login.php');		
		}


?>