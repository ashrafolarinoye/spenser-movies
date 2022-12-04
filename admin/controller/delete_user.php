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

$id_user = cleardata($_GET['id']);

if(!$id_user){
	header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

$statement = $connect->prepare('DELETE FROM users WHERE user_id = :id');
$statement->execute(array('id' => $id_user));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

	header('Location: ' . _SITE_URL);
}

}else {
		header('Location: ./login.php');		
		}


?>