<html>
   <head>
      <title>Connected to DB </title>
   </head>
   
   <body>
      <?php
	  
		 //use connection settings for db location
		
		 //-----------LOCAL CONNECTION-------------
		
		 //connection info
         $dbhost = 'localhost:3306';
		 $dbname = 'mga_db'; 
         $dbuser = 'user1';
         $dbpass = 'thisuser';
		 		 
		 //connect to db
         $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
         if(! $con ){
            die('Could not connect: ' . mysqli_error());
         }
    	 
		 

		//---------------CHECK CONNECTION-------------
		 $listdbnames = array_column(mysqli_fetch_all($con->query('SHOW DATABASES')), 0);	
		 echo '<pre> Connected successfully <br/> <br/> Db Names list: <br/><br/>'; print_r($listdbnames); echo '</pre>';
		 
		 $listdbtables = array_column(mysqli_fetch_all($con->query('SHOW TABLES')),0);
		 echo '<pre> Connected successfully <br/> <br/> Table list: <br/><br/>'; print_r($listdbtables); echo '</pre>';

		 

   
		
/*	 
		 //-------------SERVER CONNECTION-------------
		 
		 //connection info
		 $dbhost = '45.55.170.45';
		 $dbname = 'mga_db'; 
         $dbuser = 'katie';
         $dbpass = 'katiepass';
		 
		 //connect to db
         $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   
         if(! $con ){
            die('Could not connect: ' . mysqli_error());
         }
		 
/*
		//---------------CHECK CONNECTION-------------
		 $listdbnames = array_column(mysqli_fetch_all($con->query('SHOW DATABASES')), 0);	
		 echo '<pre> Connected successfully <br/> <br/> Db Names list: <br/><br/>'; print_r($listdbnames); echo '</pre>';
		 
		 $listdbtables = array_column(mysqli_fetch_all($con->query('SHOW TABLES')),0);
		 echo '<pre> Connected successfully <br/> <br/> Table list: <br/><br/>'; print_r($listdbtables); echo '</pre>';
		 
         
*/
			 mysqli_close($con);
      ?>
   </body>
</html>