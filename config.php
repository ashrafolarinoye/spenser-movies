<?php

/*--------------------*/
// Description: MoFlix - Ultimate PHP Script For Movie & TV Shows
// Author: Wicombit
// Author URI: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

//URL PROJECT
 
define ('_SITE_URL', 'https://spensermediatv.com.ng');

//DATABASE CONFIGURATION 

$database = array(

'host' => "localhost",
'db' => "spenserm_demo",
'user' => "spenserm_demo",
'pass' => "spenserm_demo"

);

// SITE CONFIGURATION 

$site_config = array(
	
    'items_page' => 20, // Number Of Items To Display Per Page (Minimum 5)
    'items_featured' => 12, // Number Of Featured Items To Display (Minimum 4)
    'items_recent' => 10, // Number Of Recent Items To Display (Minimum 5)
);

?>