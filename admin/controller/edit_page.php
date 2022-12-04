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

	$page_id = cleardata($_POST['page_id']);
	$page_title = cleardata($_POST['page_title']);
	$page_description = cleardataTextArea($_POST['page_description']);
	$page_status = cleardata($_POST['page_status']);
	$page_layout = cleardata($_POST['page_layout']);

	$statment = $connect->prepare(
		"UPDATE pages SET page_title = :page_title, page_description = :page_description, page_status = :page_status, page_layout = :page_layout WHERE page_id = :page_id"
		);

	$statment->execute(array(

		':page_title' => $page_title,
		':page_description' => $page_description,
		':page_status' => $page_status,
		':page_layout' => $page_layout,
		':page_id' => $page_id

		));

header('Location: ' . $_SERVER['HTTP_REFERER']);

} else{

$id_page = id_page($_GET['id']);
    
if(empty($id_page)){
	header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$page = get_page_per_id($connect, $id_page);
    
    if (!$page){
    header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$page = $page['0'];

}

require '../views/edit.page.view.php';
require '../views/footer.view.php';
 
}else{

	header('Location: ' . _SITE_URL);
} 

} else {
		header('Location: ./login.php');		
		}


?>