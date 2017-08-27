<?php 
include("config.php");

function SignIn() 
{ 
	session_start(); //starting the session
	if(!empty($_POST['Email'])) //checking the email, is it empty or have some text 
	
	//Searches database for users' email and psw. Displays error message if authentication fails
	{ 
		$str = sha1($_POST['Pword']);
		$echomsg = "";
		$query = mysql_query("SELECT * FROM Login where Email = '$_POST[Email]' AND Pword = '$str'");
		
		if(!$query){
			die("Query Failed".mysql_error());
		}
		else if(mysql_num_rows($query) > 0){
			$row = mysql_fetch_array($query) or die(mysql_error()); 
			
			//reset locked counter on sucessful login
			$reset_locked = mysql_query("UPDATE login SET Locked = 0 where Email = '$_POST[Email]'");
			
			session_regenerate_id();
			$_SESSION["Email"] = $row["Email"];
			$_SESSION["Pword"] = $row["Pword"];
			$_SESSION["Role"] = $row["Role"];
			$_SESSION["FName"] = $row["FName"];
			$_SESSION["LName"] = $row["LName"];
			$_SESSION["Locked"] = $row["Locked"];
			//echo $_SESSION ["Locked"];
			
			//echo $_SESSION["Role"];
			session_write_close();
			
			//Directs user to a dashboard based on role 
			if( $_SESSION["Role"] == "Faculty"){
				header('Location: facultyDashboard.php');
			  }		
			else {
				header('Location: studentDashboard.php');
			  }
		}
		
		//login credentials failed
	else{
		//query select by email
		$query2 = mysql_query("SELECT * FROM Login where Email = '$_POST[Email]'");
		
		if(!$query2){
			die("Query Failed".mysql_error());
			header('Location: index.php');  //not working need to reload
		}
		
		else{
		
		$array2 = mysql_fetch_array($query2) or die(mysql_error()); 
		//get session by email query
		
				session_regenerate_id();
				$_SESSION["LoginID"] = $array2["LoginID"];
				$_SESSION["Email"] = $array2["Email"];
				$_SESSION["Locked"] = $array2["Locked"];
				$_SESSION["Pword"] = $array2["Pword"];
								
				$login=(int)$_SESSION["LoginID"]; //for selection
				$locked=(int)$_SESSION["Locked"]; //counter for msg 
			
				//$email=$_SESSION["Email"];  //testing -- checking email
				//$seshpass = $_SESSION["Pword"]; //testing -- checking passwords
				session_write_close();
				
			//LOCKOUT AFTER 3 TRIES (starts at 0)
			if((int)$_SESSION["Locked"] >= 2){
				
				//creates semi-random lockedout password
				$number = rand(15, 1000);
				$lockedout = SHA1('mgalockedyououtsohard'. $number);
			
				//sets password to semi-random lockedout password			
				$update_password = mysql_query("UPDATE login SET Pword = '$lockedout' WHERE LoginID = $login");
				
				//top of the page message
				echo "Locked Account.\n "; 
				
				//message for form
				$echomsg .= "Your account is locked after 3 attempts.\n "; 
				$echomsg .= "Contact Administrator to unlock.\n";
				
					/* ---- Testing Messages ------
					$echomsg .= "Email: " .$email . "\n "; //testing -- checking email
					$echomsg .= $seshpass . "\n"; //testing -- checking passwords
					$echomsg .= $lockedout ."\n" ; // testing -- checking passwords
					$echomsg .= sha1('sspangler17') . "\n"; // testing -- get sspagler sha1 code temporary reset
					   ---- Testing Messages ------ */
					
				$_SESSION['errors'] = array($echomsg); //bottom error message
				
			}
			
			//LOGIN FAILED
			//update db locked counter by one and send incorrect credentials message
			else{	
			$locked = $locked + 1;
				
			$update_locked = mysql_query("UPDATE login SET Locked = $locked WHERE LoginID = $login");		
			
			//top of the page message
			echo "Check Username or Password.\n";
			
			//message for form
			$echomsg = "Account will be locked after 3 failed attempts.\n";
			$echomsg .= "Your username or password was incorrect." ."\n" ."Login Attempt: ". $locked . ".\n";
			
			$_SESSION['errors'] = array($echomsg); //bottom error message
			}
		}
	}
	} 
}
if(isset($_POST['Login'])) 
{ 
	SignIn(); 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Knightly Knowledge</title>
	<link href="stylez.css" rel="stylesheet" />
</head>
<body>
    <!--Header (school logo) -->
	<header>
		<img src="images/MiddleGeorgia_Inst_EXHoriz_DkBgrnd.jpg" alt="MGA Banner" />
	</header>
	<br>
	<!--Header (School logo - left-hand side) -->	
	<div id="loginLogo">
		<br><br><br>
		<img src="images/knightly knowledge logo.jpg" alt="MGA Knightly Knowledge Logo" width="35%" />
	</div>
	<!-- Main Content Section-->
	<main>
		<form action="#" method="post" id="loginForm">
			<fieldset><legend>Login</legend>
			<!-- Email Field-->
				<div class="two"><label for="Email">Email</label><input type="email" name="Email" 
					id="userName" placeholder="Enter Email" required></div>
			<!-- Password -->
				<div class="two"><label for="Pword">Password</label><input type="password" name="Pword" 
					id="password" placeholder="Enter Password" required></div>
			<!-- Submit form  -->
				<div class="one"><input type="submit" value="Login" name="Login" id="submit"></div>
				<div class="two"><a href="forgotpassword.php">Forgot Password?</a></div>
			<!-- Login Error Msg -->
			<?php if (isset($_SESSION['errors'])): ?>
			<div class="form-errors">
			<?php foreach($_SESSION['errors'] as $error): ?>
			<p><?php echo $error ?></p>
			<?php endforeach; ?>
			<?php endif; ?>
			</div>		
		</fieldset>
		</form>
		<br>
	</main>
	<footer>
			
	</footer>
	
</body>
</html>