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
	
$movies_total = number_movies($connect);
$movies = get_movies($connect);

$genres_total = number_genres($connect);
$genres = get_genres($connect);

$series_total = number_series($connect);
$series = get_series($connect);

$episodes_total = number_episodes($connect);
$episodes = get_episodes($connect);

$users_total = number_users($connect);

require '../views/home.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
}
  
}else {
		header('Location: ./login.php');		
		}


?>