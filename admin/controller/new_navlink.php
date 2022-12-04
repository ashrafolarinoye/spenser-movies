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

$navigation_url = cleardata($_POST['navigation_url']);
$navigation_label = cleardata($_POST['navigation_label']);
$navigation_target = cleardata($_POST['navigation_target']);
$navigation_type = cleardata($_POST['navigation_type']);
$menu_id = $_POST["menu_id"];

$statment = $connect->prepare( 'INSERT INTO navigations (navigation_id,navigation_order,navigation_url,navigation_label,navigation_target,navigation_type,navigation_menu) VALUES (null, :navigation_order, :navigation_url, :navigation_label, :navigation_target, :navigation_type, :navigation_menu)' );

	$statment->execute(array(
		':navigation_order' => $newOrder,
		':navigation_url' => $navigation_url,
		':navigation_label' => $navigation_label,
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