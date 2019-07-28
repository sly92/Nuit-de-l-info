<?php

// Constantes de BDD
// define('DB_SERVER', "sql.mtxserv.fr");
// define('DB_USER', "w_105522");
// define('DB_PASSWORD', "Pipicaca");
// define('DB_DATABASE', "105522_sql");
// define('DB_DRIVER', "mysql");

define('DB_SERVER', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "root");
define('DB_DATABASE', "up_lunch");
define('DB_DRIVER', "mysql");

// On prolonge la session
	session_start();
	
	error_reporting(E_ALL); //E_ALL
	
	header('Content-Type: text/html; charset=utf-8');
?>