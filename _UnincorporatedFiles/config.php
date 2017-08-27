<!--Connects and logs into the database. Displays error message if connection fails.-->
<!-- Set up User info for localhost -->
<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	
	//Set up User info for localhost
    define('DB_HOST', '127.0.0.1');
	define('DB_NAME', 'mga_db'); 
	define('DB_USER','user1'); 
	define('DB_PASSWORD','thisuser'); 
	
	//------------Original connection configuration-------------------
	/*
	define('DB_HOST', '168.16.222.102');
	define('DB_NAME', 'capstone-eval-tool'); 
	define('DB_USER','capstone-eval-tool-user'); 
	define('DB_PASSWORD','Ca5tN0tJuDgET*3@ch!'); 
	*/
	//--------------------------------
	
	$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_connection_error()); 
	$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
?>