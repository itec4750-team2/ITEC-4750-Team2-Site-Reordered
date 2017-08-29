<?php
if(isset($_POST['Login'])) 
{ 	
	include('config.php');
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	//echo ($_POST['Email']);
	//echo ($_POST['Pword']);
	$email = $con->real_escape_string($_POST['Email']);
	$password = $con->real_escape_string( $_POST['Pword']);
	SignIn($email,$password, $con );
	
} 
?>

<?php
function SignIn($email, $password, $con) 
{ 
	include('session.php');
	$echomsg = "";
	$_SESSION['LoginErrors'] = $echomsg;
	
	if(!empty($email)) //checking the email, is it empty or have some text 
	//Searches database for users' email and psw. Displays error message if authentication fails
	{ 
	//	echo ($dbhost.$dbuser.$dbpass.$dbname);
		$PwordCode = sha1($password);
				
		$loginStr= "SELECT * FROM login WHERE Email = '$email' AND Pword = '$PwordCode'";
	
		$login = mysqli_query($con, $loginStr);///connection opened
		
		//CHECK CONNECTION
	
		//bad connection
			if(!$login){
			$echomsg = "Check Email and Password.";	
			//$echomsg .= "$login failed ===========================================> login_functions"; //testing
			$_SESSION['LoginErrors'] = $echomsg;
			header('Location: login.php');  
			}
		//good connection
			else{ 
//login successful
			if(mysqli_num_rows($login) > 0){ 
				
				//get login session
				$array1 = mysqli_fetch_array($login);
				if(!$array1){
					$echomsg = "Check Email and password";
					//$echomsg .= "array1 failed ==================================> login_functions"; //for testing	
					$_SESSION['LoginErrors'] = $echomsg;
					header('Location: login.php');  
				}	
				else{
					$_SESSION = array();
					session_regenerate_id();
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
				}
			$echomsg = "";
			}
//login credentials failed
			else{
				//query select by email
				$loginCountStr = "SELECT * FROM login where Email = '$email'";
				$loginCount = mysqli_query($con, $loginCountStr); //connection opened
			
				//check connection
				
				//bad connection
				if(!$loginCount){
					if (isset($_SESSION)){session_unset();}
					$echomsg = "Check Email and Password";
					//$echomsg .= "$loginCount failed ==================================> login_functions";//testing
					$_SESSION['LoginErrors'] = $echomsg;
					header('Location: login.php');  
				}
				
				//good connection
				else{
					//get loginCount session by email query
					$array2 = mysqli_fetch_array($loginCount);
					
					if(!$array2){
					if (isset($_SESSION)){session_unset();}
					$echomsg = "Check Email and Password";
					//$echomsg .= "array2 failed ======================================> login_functions";//testing
					$_SESSION['LoginErrors'] = $echomsg;
					header('Location: login.php');  
					}
					else{
					$_SESSION = array();			
					session_regenerate_id();
					$_SESSION["LoginID"] = $array2["LoginID"];
					$_SESSION["Email"] = $array2["Email"];
					$_SESSION["Pword"] = $array2["Pword"];
					$_SESSION["Role"] = $array2["Role"];
					$_SESSION["FName"] = $array2["FName"];
					$_SESSION["LName"] = $array2["LName"];
					$_SESSION["Locked"] = $array2["Locked"];
										
					$login=(int)$_SESSION["LoginID"]; //for selection
					$locked=(int)$_SESSION["Locked"]; //counter for msg 
										
					//update lock counter
					$locked = $locked + 1;
					$update_lockedStr = "UPDATE login SET Locked = $locked WHERE LoginID = $login";	
					$update_locked = mysqli_query($con, $update_lockedStr);

				//$email=$_SESSION["Email"];  //testing -------------------------------------> checking email
				//$seshpass = $_SESSION["Pword"]; //testing ---------------------------------> checking passwords
						
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
					$echomsg = "Your account is locked after 3 attempts. <br>"; 
					$echomsg .= "You have attempted login: ".$locked." times. <br/>";
					$echomsg .= "Contact Administrator to unlock.<br/>";

					/* ---- Testing Messages ------
					$echomsg .= "Email: " .$email . "<br/> "; //testing --------------------------> checking email
					$echomsg .= $seshpass . "<br/>"; //testing -----------------------------------> checking passwords
					$echomsg .= $lockedout ."<br/>" ; // testing ---------------------------------> checking passwords
					$echomsg .= sha1('sspangler17') . "<br/>"; // testing ---------> get sspagler sha1 code temporary reset
					   ---- Testing Messages ------ */

					$_SESSION['LoginErrors'] = $echomsg; //bottom error message
										
					$tempPass=sha1('kmarkham17');
					echo $tempPass;
				}
	//LOGIN FAILED (retry)
				
				else{	
								
					//top of the page message
					echo "Check Username or Password.\n";
					
					//message for form
					$echomsg = "Account will be locked after 3 failed attempts.<br/>";
					$echomsg .= "Your username or password was incorrect. <br/>";
					$echomsg .= "Login Attempt #: ". $locked . ".<br/>";
					
					$_SESSION['LoginErrors'] = $echomsg; //bottom error message
				
				}
				session_write_close();
				}
				}
			}
			
		}	
	
	}	
	
	mysqli_close($con);//close database connection
}
?>