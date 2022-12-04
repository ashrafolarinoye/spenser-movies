<?php 

session_start();
if (isset($_SESSION['user_email'])){
    
    
require '../../config.php';
require '../functions.php';
require '../views/header.view.php';


$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	} 

$navigation_id = cleardata($_GET['id']);

if(!$navigation_id){
	header('Location: ./home.php');
}

$navigation_id = cleardata($_GET['id']);

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

$statement = $connect->prepare('DELETE FROM navigations WHERE navigation_id = :navigation_id');
$statement->execute(array('navigation_id' => $navigation_id));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

	header('Location: ' . _SITE_URL);
}

}else {
		header('Location: ./login.php');		
		}


?>