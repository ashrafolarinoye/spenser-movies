<?php

require './core.php';

// Title
$titleHeader = getTitle($connect);

$footmenu = getFooterMenu($connect);

$idMenu = $footmenu['menu_id'];

$navigationFooter = getNavigation($connect, $idMenu);

// Settings
$settings = getSettings($connect);

// Brand
$brand = getBrand($connect);

// Smtp
$smtp = getSmtp($connect);

require './header.php';

require_once './classes/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require_once './classes/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once './classes/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$user_email = filter_var(strtolower($_POST['user_email']), FILTER_SANITIZE_STRING);
	
	$errors = '';

	if (empty($user_email)) {

		$errors .= "<p class='errorauth'>"._ALLFIELDSREQUIRED.".</p>";
	
	}else{

		try{        
            
            $connect;
            
        }catch (PDOException $e){
            
            echo "Error: ." . $e->getMessage();   
        }

	   	  $statement = $connect->prepare("SELECT * FROM users WHERE user_email = :user_email LIMIT 1");
		  $statement->execute(array(':user_email' => $user_email));
		  $result = $statement->fetch();
		  $username = $result['user_name'];

		  if ($result == false) {
			
			$errors .= "<p class='errorauth'>"._EMAILNOTEXIST."</p>";
		  
		}
		  
}

	if ($errors == '') {


	$newpassword = generatePassword();
	$encryptpassword = hash('sha512', $newpassword);

	$statment = $connect->prepare(
	"UPDATE users SET user_password = :user_password WHERE user_email = :user_email"
	);

	$statment->execute(array(

		':user_password' => $encryptpassword,
		':user_email' => $user_email

	));

try {

    $mail->isSMTP();                                          
    $mail->Host       = $smtp['st_smtphost'];                
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = $smtp['st_smtpemail'];              
    $mail->Password   = $smtp['st_smtppassword'];                             
    $mail->SMTPSecure = $smtp['st_smtpencrypt'];
    $mail->Port       = $smtp['st_smtpport'];


    $mail->setFrom($smtp['st_smtpemail'], $settings['st_sitename']);
    $mail->addAddress($user_email);


    $mail->isHTML(true);
    $mail->Subject = _EMAILSUBJECT;
    $mail->Body = "<div style='background: #f7f6f6; padding: 40px;'><div style='display: block; max-width: 800px; margin-left: auto; margin-right: auto;'><div style='background: #ffffff; padding: 20px; border: 1px solid #dee5e7; border-radius: 6px; text-align: center; display: block;'><a href='".$urlPath->home()."'><img src='".$urlPath->image($brand['st_darklogo'])."' style='width: 100%; max-width: 180px; border: 0;'/></div><br/><div style='padding: 20px; border-radius: 6px; font-size: 14px; background-color: #ffffff; border: 1px solid #dee5e7;'>"._DEAR." <b>".$username."</b>,<br/><br/>"._EMAILMESSAGERESET." <b>".$newpassword."</b></div><br/><div style='display: block; text-align: center; font-size: 12px; color: #9E9E9E;'>"._COPYRIGHT."</div></div></div>";

    $mail->send();
    $errors .= "<p class='successauth'>"._SUCCESSPASSRESET."</p>";

} catch (Exception $e) {

    $errors .= "<p class='errorauth'>"._ERRORPASSRESET."</p>";
}  


	}


}

require './views/forgot.view.php';
require './footer.php';

?>