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

$connect = connect($database);
if(!$connect){
	header('Location: ./error.php');
	} 


$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$st_sitename = cleardata($_POST['st_sitename']);
	$st_description = cleardataTextArea($_POST['st_description']);
	$st_keywords = cleardata($_POST['st_keywords']);
	$st_facebook = cleardata($_POST['st_facebook']);
	$st_twitter = cleardata($_POST['st_twitter']);
	$st_instagram = cleardata($_POST['st_instagram']);
	$st_youtube = cleardata($_POST['st_youtube']);

$statment = $connect->prepare(
	"UPDATE settings SET
	st_sitename = :st_sitename,
	st_description = :st_description,
	st_keywords = :st_keywords,
	st_facebook = :st_facebook,
	st_twitter = :st_twitter,
	st_instagram = :st_instagram,
	st_youtube = :st_youtube
	");

	$statment->execute(array(
		':st_sitename' => $st_sitename,
		':st_description' => $st_description,
		':st_keywords' => $st_keywords,
		':st_facebook' => $st_facebook,
		':st_twitter' => $st_twitter,
		':st_instagram' => $st_instagram,
		':st_youtube' => $st_youtube
		));

}

}else{

	header('Location: ./home.php');
}

    
}else {
		header('Location: ./login.php');		
		}


?>