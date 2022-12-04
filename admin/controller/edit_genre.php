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

	$genre_title = cleardata($_POST['genre_title']);
	$genre_id = cleardata($_POST['genre_id']);
	$genre_image_save = $_POST['genre_image_save'];
	$genre_image = $_FILES['genre_image'];

	if (empty($genre_image['name'])) {
		$genre_image = $genre_image_save;
	} else{
			$imagefile = explode(".", $_FILES["genre_image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$genre_image_upload = '../../images/';
		move_uploaded_file($_FILES['genre_image']['tmp_name'], $genre_image_upload . 'genre_' . $renamefile);
		$genre_image = 'genre_' . $renamefile;
	}


$statment = $connect->prepare(
	"UPDATE genres SET genre_title = :genre_title, genre_image = :genre_image WHERE genre_id = :genre_id"
	);

$statment->execute(array(

		':genre_title' => $genre_title,
		':genre_image' => $genre_image,
		':genre_id' => $genre_id

		));

header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$id_genre = id_genre($_GET['id']);
    
if(empty($id_genre)){
	header('Location: ' . _SITE_URL . '/admin/controller/home.php');
	}

$genre = get_genre_per_id($connect, $id_genre);
    
    if (!$genre){
    header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$genre = $genre['0'];

}

require '../views/edit.genre.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
} 
   
} else {
		header('Location: ./login.php');		
		}


?>