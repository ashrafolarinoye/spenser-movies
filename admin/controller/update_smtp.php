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


	$st_smtphost = cleardata($_POST['st_smtphost']);
	$st_smtpemail = cleardata($_POST['st_smtpemail']);
	$st_smtppassword = cleardata($_POST['st_smtppassword']);
	$st_smtpport = cleardata($_POST['st_smtpport']);
	$st_smtpencrypt = cleardata($_POST['st_smtpencrypt']);


$statment = $connect->prepare(
	"UPDATE smtp SET
	st_smtphost = :st_smtphost,
	st_smtpemail = :st_smtpemail,
	st_smtppassword = :st_smtppassword,
	st_smtpport = :st_smtpport,
	st_smtpencrypt = :st_smtpencrypt
	");

	$statment->execute(array(
		':st_smtphost' => $st_smtphost,
		':st_smtpemail' => $st_smtpemail,
		':st_smtppassword' => $st_smtppassword,
		':st_smtpport' => $st_smtpport,
		':st_smtpencrypt' => $st_smtpencrypt
		));

}

}else{

	header('Location: ./home.php');
}

    
}else {
		header('Location: ./login.php');		
		}


?>