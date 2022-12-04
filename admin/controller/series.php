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

$series = get_all_series($connect);

$series_total = number_series($connect);

require '../views/series.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
}

}else {
		header('Location: ./login.php');		
		}


?>