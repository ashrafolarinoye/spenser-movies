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
	$user_name = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
	$user_password = filter_var($_POST["user_password"], FILTER_SANITIZE_STRING);
	$encrtypted_password = hash('sha512', $user_password);
	
	$errors = '';

	if (empty($user_email) OR empty($user_password) OR empty($user_name)) {

		$errors .= "<p class='errorauth'>"._ALLFIELDSREQUIRED."</p>";
	
	}else{

		try{        
            
            $connect;
            
        }catch (PDOException $e){
            
            echo "Error: ." . $e->getMessage();   
        }

	   	  $statement = $connect->prepare("SELECT * FROM users WHERE user_email = :user_email LIMIT 1");
		  $statement->execute(array(':user_email' => $user_email));
		  $result = $statement->fetch();

		  if ($result != false) {
			
			$errors .= "<p class='errorauth'>"._EMAILALREADYEXIST."</p>";
		  
		  }
		  
}

	if ($errors == '') {

          $statement = $connect->prepare("INSERT INTO users (user_id, user_name, user_email, user_password) VALUES (null, :user_name, :user_email, :user_password)");
		  $statement->execute(array(
		  	':user_name' => $user_name,
		  	':user_email' => $user_email,
		  	':user_password' => $encrtypted_password
		  ));

		header('Location: '. $urlPath->signin());

	}


}

}

require './views/signup.view.php';
require './footer.php';

?>