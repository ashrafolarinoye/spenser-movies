<?php 

/*--------------------*/
// App Name: MoFlix
// Description: MoFlix - Ultimate PHP Script For Movie & TV Shows
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
// Version: 1.00
/*--------------------*/

session_start();

require '../config.php';
require './functions.php';

$connect = connect($database);
if(!$connect){
	header('Location: ' . _SITE_URL . '/admin/controller/error.php');
	}

if (isset($_SESSION['user_email'])){

	$check_access = check_access($connect);

	if ($check_access['user_role'] == 1){
    
	header('Location: ' . _SITE_URL . '/admin/controller/home.php');

	}else {

		header('Location: ' . _SITE_URL);

	}

} else {
    
	header('Location: ' . _SITE_URL . '/admin/controller/login.php');

}

?>