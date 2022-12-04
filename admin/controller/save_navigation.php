<?php

require '../../config.php';
require '../functions.php';

$connect = connect($database);

$check_access = check_access($connect);

if ($check_access['user_role'] == 1){

$menu = $_GET['menu'];

if (isset($_POST)) {

    $arrayItems = cleardata($_POST['item']);
    $order = 0;


        foreach ($arrayItems as $item) {
            $order++;
            $statement = $connect->prepare("UPDATE navigations SET navigation_order='$order' WHERE navigation_id='$item'");
            $statement->execute();
        }

    echo 'Successfully Updated';
}

}else{

	header('Location: ' . _SITE_URL);
}


?>

