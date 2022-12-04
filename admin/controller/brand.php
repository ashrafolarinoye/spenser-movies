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

	$st_favicon_save = $_POST['st_favicon_save'];
	$st_favicon = $_FILES['st_favicon'];

	if (empty($st_favicon['name'])) {
		$st_favicon = $st_favicon_save;
	} else{
			$imagefile = explode(".", $_FILES["st_favicon"]["name"]);
			$renamefile = '.' . end($imagefile);
		$st_favicon_upload = '../../images';
		move_uploaded_file($_FILES['st_favicon']['tmp_name'], $st_favicon_upload . 'favicon' . $renamefile);
		$st_favicon = 'favicon' . $renamefile;
	}

	$st_whitelogo_save = $_POST['st_whitelogo_save'];
	$st_whitelogo = $_FILES['st_whitelogo'];

	if (empty($st_whitelogo['name'])) {
		$st_whitelogo = $st_whitelogo_save;
	} else{
			$imagefile = explode(".", $_FILES["st_whitelogo"]["name"]);
			$renamefile = '.' . end($imagefile);
		$st_whitelogo_upload = '../../images';
		move_uploaded_file($_FILES['st_whitelogo']['tmp_name'], $st_whitelogo_upload . 'whitelogo' . $renamefile);
		$st_whitelogo = 'whitelogo' . $renamefile;
	}

	$st_darklogo_save = $_POST['st_darklogo_save'];
	$st_darklogo = $_FILES['st_darklogo'];

	if (empty($st_darklogo['name'])) {
		$st_darklogo = $st_darklogo_save;
	} else{
			$imagefile = explode(".", $_FILES["st_darklogo"]["name"]);
			$renamefile = '.' . end($imagefile);
		$st_darklogo_upload = '../../images';
		move_uploaded_file($_FILES['st_darklogo']['tmp_name'], $st_darklogo_upload . 'darklogo' . $renamefile);
		$st_darklogo = 'darklogo' . $renamefile;
	}


	$st_icon_save = $_POST['st_icon_save'];
	$st_icon = $_FILES['st_icon'];

	if (empty($st_icon['name'])) {
		$st_icon = $st_icon_save;
	} else{
			$imagefile = explode(".", $_FILES["st_icon"]["name"]);
			$renamefile = '.' . end($imagefile);
		$st_icon_upload = '../../images';
		move_uploaded_file($_FILES['st_icon']['tmp_name'], $st_icon_upload . 'graylogo' . $renamefile);
		$st_icon = 'icon' . $renamefile;
	}


$statment = $connect->prepare(
	"UPDATE brand SET
	st_favicon = :st_favicon,
	st_whitelogo = :st_whitelogo,
	st_darklogo = :st_darklogo,
	st_icon = :st_icon
	");

	$statment->execute(array(
		':st_favicon' => $st_favicon,
		':st_whitelogo' => $st_whitelogo,
		':st_darklogo' => $st_darklogo,
		':st_icon' => $st_icon
		));

header('Location: ' . $_SERVER['HTTP_REFERER']);


} else{

$brand = get_brand($connect);

$brand = $brand['0'];

require '../views/brand.view.php';
require '../views/footer.view.php';

}

}else{

	header('Location: ' . _SITE_URL);
} 
    
}else {
		header('Location: ./login.php');		
		}


?>