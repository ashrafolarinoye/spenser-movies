<?php

require "core.php";

session_start();

session_destroy();
$_SESSION = array ();

header('Location: '. $urlPath->home());

?>