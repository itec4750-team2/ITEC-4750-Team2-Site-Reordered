<html>
<body>
<?php
	// $con and $server to be used throughout site
	// ++++ Change: Added $server variable to make it easy to change reference paths.
	$server ="//{$_SERVER['SERVER_NAME']}";	

	// Lets try Katies DB first
	// This should be simplified when this is placed into production to simply query 1 database
	
	//-------------SERVER CONNECTION-------------
	//connection info
	$dbhost = 'mga-db.chdrdc01ua4v.us-east-2.rds.amazonaws.com';
	$dbname = 'mga_db'; 
	$dbuser = 'fcheeley';
	$dbpass = 'fcheeley123';

	//connect to db
	@$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
	//-------------------------------------------

	 if(mysqli_connect_errno()){ // failed to connect to katies database; lets try local host next
		//-------------SERVER CONNECTION-------------
		//connection info
		$dbhost = 'localhost:3306';
		$dbname = 'mga_db'; 
		$dbuser = 'user1';
		$dbpass = 'thisuser';
		$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
		if(mysqli_connect_errno()){  // failed to connect to local db too
			die('Could not connect: ' . mysqli_connect_error());
		}
		else {
			echo "<script type = 'text/javascript'>alert('Online DB unavailable, connected to local DB');</script>";
		}
	 }
	?>
</body>
</html>
