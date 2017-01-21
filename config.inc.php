<?php
if(empty($_SESSION)){
    
    session_start();
}


// Database Settings
define('DB_SERVER', "localhost");           // Database Host
define('DB_USER', "root");                  // Databse User
define('DB_PASS', "");                      // Database Password
define('DB_DATABASE', "cms");   		// Database Name


?>
