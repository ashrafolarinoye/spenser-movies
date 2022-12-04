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

	$id = cleardata($_POST['id']);
	$content = cleardataTextArea($_POST['content']);
	$status = cleardata($_POST['status']);



$statment = $connect->prepare(
	"UPDATE ads SET content = :content, status = :status WHERE id = :id"
	);

$statment->execute(array(

		':content' => $content,
		':status' => $status,
		':id' => $id

		));

		header('Location: ./ads.php');		

} else{

$id = $_GET['id'];
    
if(empty($id)){
	header('Location: ' . _SITE_URL . '/admin/controller/home.php');
	}

$ad = get_ad_per_id($connect, $id);
    
    if (!$ad){
    header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$ad = $ad['0'];

}

require '../views/edit.ad.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
} 
   
} else {
		header('Location: ./login.php');		
		}


?>