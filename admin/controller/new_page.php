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
	$page_title = cleardata($_POST['page_title']);
	$page_description = cleardataTextArea($_POST['page_description']);
	$page_status = cleardata($_POST['page_status']);
	$page_layout = cleardata($_POST['page_layout']);

	$slug = convert_slug($page_title);
	$exists = get_page_slug($connect, $slug);

	if ($exists > 0)
	{
	    $new_number = $exists + 1;
	    $page_slug = $slug."-".$new_number;

	}else{

	$page_slug = convert_slug($page_title);

	}

	$statment = $connect->prepare(
		"INSERT INTO pages (page_id,page_title,page_description,page_status,page_layout,page_slug,page_date) VALUES (null, :page_title, :page_description, :page_status, :page_layout, :page_slug, CURRENT_TIME)"
		);

	$statment->execute(array(
		':page_title' => $page_title,
		':page_description' => $page_description,
		':page_status' => $page_status,
		':page_layout' => $page_layout,
		':page_slug' => $page_slug
		));

	header('Location:' . _SITE_URL . '/admin/controller/pages.php');

}

require '../views/new.page.view.php';
require '../views/footer.view.php';


}else{

	header('Location: ' . _SITE_URL);
}

}else {
		header('Location: ./login.php');		
		}


?>