<?php 

require './config.php';
require './functions.php';

session_start();
if (isLogged()){

$connect = connect($database);
if(!$connect){
    echo "Something Wrong";
}
    
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Get Values 
    $user_id = clearData($_POST['user_id']);
    $user_name = clearData($_POST['user_name']);
    $password_save = clearData($_POST['user_password_save']);
    $password_new = clearData($_POST['user_password']);

    if (empty($password_new)) {
        $password = $password_save;
    } else{
        $password = hash('sha512', $password_new);
    }

$statment = $connect->prepare(
    "UPDATE users SET user_name = :user_name, user_password = :user_password WHERE user_id = :user_id"
    );

$statment->execute(array(

        ':user_id' => $user_id,
        ':user_name' => $user_name,
        ':user_password' => $password,

        ));

        header('Location: ' . $_SERVER['HTTP_REFERER']);

}else{

    exit();
}


}else {

    echo "Something Wrong";
	
    }


?>