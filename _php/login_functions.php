<?php
if(isset($_POST['Login'])) 
{ 
	//echo ($_POST['Email']);
	//echo ($_POST['Pword']);
	SignIn($_POST['Email'], $_POST['Pword']); 	
} 
?>

<?php
function SignIn($email, $password) 
{ 
	include('config.php');
	include('session.php');
	$echomsg = "";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$_SESSION['LoginErrors'] = array();
	
	//echo $email;
	
	if(!empty($email)) //checking the email, is it empty or have some text 
	//Searches database for users' email and psw. Displays error message if authentication fails
	{ 
	//	echo ($dbhost.$dbuser.$dbpass.$dbname);
		$PwordCode = sha1($password);
				
		$loginStr= "SELECT * FROM login WHERE Email = '$email' AND Pword = '$PwordCode'";
	
		$login = mysqli_query($con, $loginStr);///connection opened
		
		//CHECK CONNECTION
	
		//bad connection 
		if(!$login){ die("Error description: login connection failed.");}
		
		//good connection
		else{ 
//login successful
			if(mysqli_num_rows($login) > 0){ 
			
			//get login session
			$array1 = mysqli_fetch_array($login) or die("Error description: login session query failed.");
			

		
			//create session
			//createSesh($array1);
			
			$_SESSION["LoginID"] = $array1["LoginID"];
			$_SESSION["Email"] = $array1["Email"];
			$_SESSION["Pword"] = $array1["Pword"];
			$_SESSION["Role"] = $array1["Role"];
			$_SESSION["FName"] = $array1["FName"];
			$_SESSION["LName"] = $array1["LName"];
			$_SESSION["Locked"] = 0;
			
			//reset locked counter on sucessful login
			$reset_lockedStr ="UPDATE login SET Locked = 0 WHERE Email = '$email'";	
			$reset_locked = mysqli_query($con, $reset_lockedStr);	
			

			//echo $_SESSION["Role"];
			
			session_write_close();
			
			
			//Directs user to a dashboard based on role 
			if( $_SESSION["Role"] == "Faculty"){
				header('Location: _facultyPages/facultyDashboard.php');
			  }		
			else {
				header('Location: _studentPages/studentDashboard.php');
			  }
			mysqli_close($login); //close connection
			}
//login credentials failed
			else{
				//query select by email
				$loginCountStr = "SELECT * FROM login where Email = '$email'";
				$loginCount = mysqli_query($con, $loginCountStr); //connection opened
			
				//check connection
				
				//bad connection
				if(!$loginCount){ die("Query Failed: User not found");//header('Location: login.php');  //not working need to reload
				}
				
				//good connection
				else{
					
				//get loginCount session by email query
				$array2 = mysqli_fetch_array($loginCount) or die("Error description: loginCount session query failed.");
								
				$_SESSION = array();
				session_regenerate_id();
				//session_destroy();
				//create session
				
				//create session
				//createSesh($array2);
	
				$_SESSION["LoginID"] = $array2["LoginID"];
				$_SESSION["Email"] = $array2["Email"];
				$_SESSION["Pword"] = $array2["Pword"];
				$_SESSION["Role"] = $array2["Role"];
				$_SESSION["FName"] = $array2["FName"];
				$_SESSION["LName"] = $array2["LName"];
				$_SESSION["Locked"] = $array2["Locked"];
			
				
				//echo $_SESSION["Role"];
				
									
				$login=(int)$_SESSION["LoginID"]; //for selection
				$locked=(int)$_SESSION["Locked"]; //counter for msg 
				
									
				//update lock counter
				$locked = $locked + 1;
				$update_lockedStr = "UPDATE login SET Locked = $locked WHERE LoginID = $login";	
				$update_locked = mysqli_query($con, $update_lockedStr);

				//$email=$_SESSION["Email"];  //testing -- checking email
				//$seshpass = $_SESSION["Pword"]; //testing -- checking passwords
						
	//LOCKOUT AFTER 3 TRIES (starts at 0)
				if((int)$_SESSION["Locked"] >= 2){
					
					//creates semi-random lockedout password
					$number = rand(15, 1000);
					$lockedout = SHA1('mgalockedyououtsohard'. $number);

					//sets password to semi-random lockedout password			
					$update_passwordStr = "UPDATE login SET Pword = '$lockedout' WHERE LoginID = $login";
					$update_password = mysqli_query($con, $update_passwordStr);

					//top of the page message
					echo "Locked Account."; 

					//message for form
					$echomsg .= "Your account is locked after 3 attempts. <br>"; 
					$echomsg .= "You have attempted login: ".$locked." times. <br/>";
					$echomsg .= "Contact Administrator to unlock.<br/>";

					/* ---- Testing Messages ------
					$echomsg .= "Email: " .$email . "\n "; //testing -- checking email
					$echomsg .= $seshpass . "\n"; //testing -- checking passwords
					$echomsg .= $lockedout ."\n" ; // testing -- checking passwords
					$echomsg .= sha1('sspangler17') . "\n"; // testing -- get sspagler sha1 code temporary reset
					   ---- Testing Messages ------ */

					$_SESSION['LoginErrors'] = array($echomsg); //bottom error message
					//echo $_SESSION['LoginErrors'];					
					$tempPass=sha1('kmarkham17');
					echo $tempPass;
				}
	//LOGIN FAILED (retry)
				
				else{	
								
					//top of the page message
					echo "Check Username or Password.\n";
					
					//message for form
					$echomsg = "Account will be locked after 3 failed attempts.<br/>";
					$echomsg .= "Your username or password was incorrect. <br/> Login Attempt #: ". $locked . ".<br/>";
					
					$_SESSION['LoginErrors'] = array($echomsg); //bottom error message
					//echo $_SESSION['LoginErrors'];
				}
				session_write_close();
				}
				//mysqli_close($loginCount); //close connection
			}
			
		}			
	}	
}
?>