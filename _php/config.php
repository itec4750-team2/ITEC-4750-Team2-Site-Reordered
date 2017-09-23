      <?php
	 // $con and $server to be used throughout site
	 // ++++ Change: Added $server variable to make it easy to change reference paths.
	$server ="//{$_SERVER['SERVER_NAME']}";	
		 //-----------LOCAL CONNECTION-------------
		/*
		 //connection info
         	 $dbhost = 'localhost:3306';
		 $dbname = 'mga_db'; 
         	 $dbuser = 'user1';
          	 $dbpass = 'thisuser';
		 $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		 */
		 //-------------------------------------------

	 //-------------SERVER CONNECTION-------------
	 //connection info
	 $dbhost = '45.55.170.45';
	 $dbname = 'mga_db'; 
	 $dbuser = 'katie';
	 $dbpass = 'katiepass';

	 //connect to db
	 $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); 
	 //-------------------------------------------

         if(! $con ){
            die('Could not connect: ' . mysqli_error());
         }
      ?>
   </body>
</html>
