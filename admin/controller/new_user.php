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
	$user_name = cleardata($_POST['user_name']);
	$user_email = cleardata($_POST['user_email']);
	$password = cleardata($_POST['user_password']);
	$user_role = cleardata($_POST['user_role']);
	$encryptPass = hash('sha512', $password);

	$statment = $connect->prepare(
		"INSERT INTO users (user_id,user_name,user_email,user_password,user_role,user_status) VALUES (null, :user_name, :user_email, :user_password, :user_role, 1)"
		);

	$statment->execute(array(
		':user_name' => $user_name,
		':user_email' => $user_email,
		':user_password' => $encryptPass,
		':user_role' => $user_role

		));

	header('Location:' . _SITE_URL . '/admin/controller/users.php');

}

require '../views/new.user.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
}

}else {
		header('Location: ./login.php');		
		}


?>