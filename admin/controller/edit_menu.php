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

$menu_id = cleardata($_POST['menu_id']);
$menu_name = cleardata($_POST['menu_name']);
$menu_header = cleardata($_POST['menu_header']);
$menu_footer = cleardata($_POST['menu_footer']);
$menu_sidebar = cleardata($_POST['menu_sidebar']);
$menu_status = cleardata($_POST['menu_status']);

$statment = $connect->prepare(
	"UPDATE menus SET menu_id = :menu_id, menu_name = :menu_name, menu_header = :menu_header, menu_footer = :menu_footer, menu_sidebar = :menu_sidebar, menu_status = :menu_status WHERE menu_id = :menu_id"
	);

$statment->execute(array(

		':menu_id' => $menu_id,
		':menu_name' => $menu_name,
		':menu_header' => $menu_header,
		':menu_footer' => $menu_footer,
		':menu_sidebar' => $menu_sidebar,
		':menu_status' => $menu_status

		));

header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

$id_menu = id_menu($_GET['id']);

$menu = get_menu_per_id($connect, $id_menu);

if (!$menu){
    header('Location: ./home.php');
}

$menu = $menu['0'];

}

$navigations = get_navigations_by_menu($connect, $id_menu);
$pages = get_all_pages($connect);

require '../views/edit.menu.view.php';
require '../views/footer.view.php';

}else{

	header('Location: ' . _SITE_URL);
}  

} else {
		header('Location: ./login.php');		
		}


?>