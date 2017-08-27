<?php 
include("config.php");
//-- define variables
$email=$password="";
$loginErr="";

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//---- -----
function SignIn() 
{ 
//-- define variables
$loginErr="";
$email = clean_input($_POST['Email']);
$password = clean_input($_POST['Pword']);
  
session_start(); //starting the session

if($email != "") //checking the email, is it empty or have some text 
//Searches database for users' email and psw. Displays error message if authentication fails
	{ 
		$str = sha1($password);
		//$str=$_POST['Pword'];
		//echo $str;
		$query = mysql_query("SELECT * FROM Login where Email = '$email' AND Pword = '$str'");

		if(!$query){	
			die("Query Failed". mysql_error());
		}
		else if(mysql_num_rows($query) > 0){
			$row = mysql_fetch_array($query) or die("Session Failed: " . mysql_error()); 
			  
			session_regenerate_id();
				$_SESSION["Email"] = $row["Email"];
				$_SESSION["Pword"] = $row["Pword"];
				$_SESSION["Role"] = $row["Role"];
				$_SESSION["FName"] = $row["FName"];
				$_SESSION["LName"] = $row["LName"];

					echo $_SESSION["Role"];
					session_write_close();
				  //Directs user to a dashboard based on role 
				  if( $_SESSION["Role"] == "Faculty"){
					header('Location: facultyDashboard.php');
				  }		
					else {
					header('Location: studentDashboard.php');
				  }
			}
		else{
			$email=$password="";
			$_SESSION['errors'] = array("Your username or password was incorrect.");
				echo "Check Username or Password.";
				//$loginErr .= "Check Username or Password.";
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
		<form method="post" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
		
			</div>
			</fieldset>
		</form>


		<br>
	</main>
	<footer>
			
	</footer>
	
</body>
</html>