<?php 


/*--------------------*/
// App Name: MoFlix
// Description: MoFlix - Ultimate PHP Script For Movie & TV Shows
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
// Version: 1.00
/*--------------------*/

session_start();

require '../../config.php';
require '../functions.php';
require '../views/header.view.php';

if (isset($_SESSION['user_email'])){
    
    header('Location: ' . _SITE_URL . '/admin/controller/home.php');
}

$connect = connect($database);
if(!$connect){
	header('Location: ' . _SITE_URL . '/admin/controller/error.php');
	}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$user_email = filter_var(strtolower($_POST['user_email']), FILTER_SANITIZE_STRING);
	$user_password = cleardata($_POST['user_password']);
	$password = hash('sha512', $user_password);
	
	$errors = '';

	try{        
            $connect;
            
        }catch (PDOException $e){
            
            echo "Error: ." . $e->getMessage();   
       }
	   	  $statement = $connect->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_password = :user_password AND user_status = 1 AND user_role = 1");
		  $statement->execute(array(
		  ':user_email' => $user_email,
		  ':user_password' => $password
		  
		  ));
		  
		  
		  $result_login = $statement->fetch();
		  
		 if ($result_login !== false){
			 $_SESSION['signedin'] = true;
			 $_SESSION['user_email'] = $user_email;
			 $_SESSION['user_name'] = $result_login['user_name'];

    	header('Location: ' . _SITE_URL . '/admin/controller/home.php');
			 
			 }else{
				 
				 $errors .='incorrect login data or access denied';
			}

	  }
	  


require '../views/login.view.php';
require '../views/footer.view.php';

?>