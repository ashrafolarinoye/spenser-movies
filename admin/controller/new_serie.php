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
	header('Location: ' . _SITE_URL . '/admin/controller/error.php');
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

	$slug = convert_slug($serie_title);
	$exists = get_serie_slug($connect, $slug);

	if ($exists > 0)
	{
	    $new_number = $exists + 1;
	    $serie_slug = $slug."-".$new_number;

	}else{

	$serie_slug = convert_slug($serie_title);

	}

	$serie_image = $_FILES['serie_image']['tmp_name'];
	$imagefile = explode(".", $_FILES["serie_image"]["name"]); 
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$serie_image_upload = '../../images/';

	move_uploaded_file($serie_image, $serie_image_upload . 'serie_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO series (serie_id,serie_title,serie_description,serie_year,serie_status,serie_featured,serie_trailer,serie_stars,serie_slug,serie_date,serie_image) VALUES (null, :serie_title, :serie_description, :serie_year, :serie_status, :serie_featured, :serie_trailer, :serie_stars, :serie_slug, CURRENT_TIME, :serie_image)'
		);

	$statment->execute(array(
		':serie_title' => $serie_title,
		':serie_description' => $serie_description,
		':serie_year' => $serie_year,
		':serie_status' => $serie_status,
		':serie_featured' => $serie_featured,
		':serie_trailer' => $serie_trailer,
		':serie_stars' => $serie_stars,
		':serie_slug' => $serie_slug,
		':serie_image' => 'serie_' . $renamefile
		));

$statment = $connect->prepare("SELECT @@identity AS id");
$statment->execute();
$resultado = $statment->fetchAll();
$id = 0;
foreach ($resultado as $row) {
        $id = $row["id"];
    }

$statment = $connect->prepare( "INSERT INTO series_genres (genre_id,serie_id) VALUES (:genre_id, :serie_id)");
$statment->bindParam(':genre_id', $idgenre);
$statment->bindParam(':serie_id', $id);

foreach ($serie_genre as $option_value)
{
   $idgenre = $option_value;
   $statment->execute();
}

	header('Location:' . _SITE_URL . '/admin/controller/series.php');

}

$genres = get_all_genres($connect);


require '../views/new.serie.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
}   

}else {
		header('Location: ./login.php');		
		}


?>