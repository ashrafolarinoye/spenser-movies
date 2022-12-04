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

$id_menu = cleardata($_GET['id']);

if(!$id_menu){
	header('Location: ./home.php');
}

$id_menu = cleardata($_GET['id']);

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

$statement = $connect->prepare('DELETE FROM navigations WHERE navigation_menu = :navigation_menu');
$statement->execute(array('navigation_menu' => $id_menu));

$statement = $connect->prepare('DELETE FROM menus WHERE menu_id = :menu_id');
$statement->execute(array('menu_id' => $id_menu));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

	header('Location: ' . _SITE_URL);
}

}else {
		header('Location: ./login.php');		
		}


?>