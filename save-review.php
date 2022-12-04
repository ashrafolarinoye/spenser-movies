<?php 

require './config.php';
require './functions.php';

session_start();
if (isLogged()){

$connect = connect($database);
if(!$connect){
    echo "Something Wrong";
	}


$getType = clearGetData($_GET['type']);

if ($getType == 'movie') {
    
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Get Values 

    $item = clearData($_POST['item']);
    $user = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    $content = clearData($_POST['content']);
    $rating = clearData($_POST['rating']);

    // Check if the user have already posted a review for the movie

    $alreadyReviewed = getUserReviewByMovie($item, $connect);


    if (!$alreadyReviewed) {

    $statment = $connect->prepare(
        "INSERT INTO movies_reviews (id, item, user, content, rating, published) VALUES (null, :item, :user, :content, :rating, CURRENT_TIMESTAMP)");

        $statment->execute(array(
            ':item' => $item,
            ':user' => $user,
            ':content' => $content,
            ':rating' => $rating
            ));

        exit();

    }

}

}elseif ($getType == 'serie') {

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Get Values 

    $item = clearData($_POST['item']);
    $user = filter_var(strtolower($_SESSION['user_email']), FILTER_SANITIZE_STRING);
    $content = clearData($_POST['content']);
    $rating = clearData($_POST['rating']);

    // Check if the user have already posted a review for the movie

    $alreadyReviewed = getUserReviewBySerie($item, $connect);


    if (!$alreadyReviewed) {

    $statment = $connect->prepare(
        "INSERT INTO series_reviews (id, item, user, content, rating, published) VALUES (null, :item, :user, :content, :rating, CURRENT_TIMESTAMP)");

        $statment->execute(array(
            ':item' => $item,
            ':user' => $user,
            ':content' => $content,
            ':rating' => $rating
            ));

        exit();

    }

}

}else{

    exit();
}


}else {

    echo "Something Wrong";
	
    }


?>