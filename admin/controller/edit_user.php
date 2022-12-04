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

	$user_id = cleardata($_POST['user_id']);
	$user_name = cleardata($_POST['user_name']);
	$user_email = cleardata($_POST['user_email']);
	$user_status = cleardata($_POST['user_status']);

	$password_save = cleardata($_POST['user_password_save']);
	$password = cleardata($_POST['user_password']);

	if (empty($password)) {
		$password = $password_save;
	} else{
		
		$password = hash('sha512', $password);
	}

	$user_updated = cleardata($_POST['user_updated']);

$statment = $connect->prepare(
	"UPDATE users SET user_id = :user_id, user_name = :user_name, user_email = :user_email, user_status = :user_status, user_password = :user_password, user_updated = CURRENT_TIME WHERE user_id = :user_id"
	);

$statment->execute(array(

		':user_id' => $user_id,
		':user_name' => $user_name,
		':user_email' => $user_email,
		':user_status' => $user_status,
		':user_password' => $password

		));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

$id_user = id_user($_GET['id']);

$usr = get_user_per_id($connect, $id_user);

    if (!$usr){
    header('Location: ./home.php');
}

$usr = $usr['0'];

}

require '../views/edit.user.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
} 
    
} else {
		header('Location: ./login.php');		
		}


?>