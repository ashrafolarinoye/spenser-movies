<?php 

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

$stat = $connect->prepare('SELECT navigation_order FROM navigations ORDER BY navigation_order DESC LIMIT 1');
$stat->execute();
$row = $stat->fetch(PDO::FETCH_ASSOC);
$orderNumber = $row["navigation_order"];

$newOrder = $orderNumber + 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$page_id = cleardata($_POST['page_id']);
$menu_id = cleardata($_POST["menu_id"]);

$stat2 = $connect->prepare("SELECT * FROM pages WHERE page_id = '".$page_id."' LIMIT 1");
$stat2->execute();
$row2 = $stat2->fetch(PDO::FETCH_ASSOC);
$page_title = $row2["page_title"];
$page_slug = $row2["page_slug"];

$navigation_target = cleardata($_POST['navigation_target']);
$navigation_type = cleardata($_POST['navigation_type']);

	$statment = $connect->prepare( "INSERT INTO navigations (navigation_id,navigation_order,navigation_url,navigation_label,navigation_target,navigation_type,navigation_menu) VALUES (null, :navigation_order, :navigation_url, :navigation_label, :navigation_target, :navigation_type, :navigation_menu)" );

	$statment->execute(array(
		':navigation_order' => $newOrder,
		':navigation_url' => $page_id.'/'.$page_slug,
		':navigation_label' => $page_title,
		':navigation_target' => $navigation_target,
		':navigation_type' => $navigation_type,
		':navigation_menu' => $menu_id
		));


}

}else{

	header('Location: ' . _SITE_URL);
}
    
}else {
		header('Location: ./login.php');		
		}


?>