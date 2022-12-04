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

$menu_name = cleardata($_POST['menu_name']);
$menu_header = cleardata($_POST['menu_header']);
$menu_footer = cleardata($_POST['menu_footer']);
$menu_sidebar = cleardata($_POST['menu_sidebar']);


	$statment = $connect->prepare( "INSERT INTO menus (menu_id,menu_name,menu_header,menu_footer,menu_sidebar) VALUES (null, :menu_name, :menu_header, :menu_footer, :menu_sidebar)" );

	$statment->execute(array(
		':menu_name' => $menu_name,
		':menu_header' => $menu_header,
		':menu_footer' => $menu_footer,
		':menu_sidebar' => $menu_sidebar

		));


}

}else{

	header('Location: ' . _SITE_URL);
}

}else {
		header('Location: ./login.php');		
		}


?>