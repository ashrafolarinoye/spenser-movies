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
	$st_privacypolicy = $_POST['st_privacypolicy'];
	$st_termsofservice = $_POST['st_termsofservice'];
	$st_aboutus = $_POST['st_aboutus'];

$statment = $connect->prepare(
	'UPDATE strings SET
	st_privacypolicy = :st_privacypolicy,
	st_termsofservice = :st_termsofservice,
	st_aboutus = :st_aboutus
	');

	$statment->execute(array(
		':st_privacypolicy' => $st_privacypolicy,
		':st_termsofservice' => $st_termsofservice,
		':st_aboutus' => $st_aboutus
		));

	header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$strings = get_all_strings($connect);

$strings = $strings['0'];

}

require '../views/strings.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
} 

}else {
		header('Location: ./login.php');		
		}


?>