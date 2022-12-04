<?php

require './core.php';

// Title
$titleHeader = getTitle($connect);

$footmenu = getFooterMenu($connect);

$idMenu = $footmenu['menu_id'];

$navigationFooter = getNavigation($connect, $idMenu);

require './header.php';

if (isLogged()){

	header('Location: '. $urlPath->home());


}else{


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$user_email = filter_var(strtolower($_POST['user_email']), FILTER_SANITIZE_STRING);
	$user_password = filter_var($_POST["user_password"], FILTER_SANITIZE_STRING);
	$encrtypted_password = hash('sha512', $user_password);
	
	$errors = '';

	try{        
            $connect;
            
        }catch (PDOException $e){
            
            echo "Error: ." . $e->getMessage();   
       }
	   	  $statement = $connect->prepare("SELECT * FROM users WHERE user_email = :user_email AND user_password = :user_password AND user_status = 1");
		  $statement->execute(array(
		  ':user_email' => $user_email,
		  ':user_password' => $encrtypted_password
		  
		  ));
		  
		  
		  $result_login = $statement->fetch();
		  
		 if ($result_login !== false){
			 $_SESSION['signedin'] = true;
			 $_SESSION['user_email'] = $user_email;
			 $_SESSION['user_name'] = $result_login['user_name'];
			 
			 header('Location: '. $urlPath->home());
			 
			 }else{
				 
				 $errors .= "<p class='errorauth'>"._ERRORLOGIN."</p>";
			}

	  }
}

require './views/signin.view.php';
require './footer.php';

?>