<?php
if(!empty($_GET['password'])){
	include('config.php');
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$check = $con->real_escape_string($_GET["password"]);
	if ($check = "forgotten"){$_SESSION = array(); mysqli_close($con);}
}
?>
<?php
if(isset($_POST['reqPass'])) 
{ 	
	include('config.php');
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	//echo ($_POST['Email']);
	//echo ($_POST['Pword']);
	$email = $con->real_escape_string($_POST['Email']);
		
	requestPass($email, $con );	
} 
?>

<?php
if(isset($_POST['resetPass']))
{	
		$_SESSION = array();
		include('config.php');
		$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		
		//get email from page header
		$email = $con->real_escape_string($_GET["email"]);
		$token = $con->real_escape_string($_GET["token"]);
		
		//two password entries posted for comparison	
		$password1 = $con->real_escape_string($_POST['Pword1']);
		$password2 = $con->real_escape_string($_POST['Pword2']);
		
		//check that passwords posted match, set error message if they do not
		if($password1 = $password2){
			$new_password = $password1;	
			echo $new_password;
			newPasswordAssign($email,$token, $new_password, $con );	
		}
		else{
			$_SESSION['$ErrorBlock'] = "Passwords entered do not match.";
		}
	
}
?>

<?php
function requestPass($email,$con) 
{ 	
	include('_php/email.php');
	$_SESSION = array();
//	include('session.php');

	$_SESSION['ErrorBlock'] = "";	
	$_SESSION['Email'] = $email;
	
		//query select by email
		$getByEmailStr = "SELECT * FROM login where Email = '$email'";
		$getByEmail = mysqli_query($con, $getByEmailStr); //connection opened

		//check connection
		
		//bad connection - reload with message
		if(!$getByEmail){
			$_SESSION['ErrorBlock'] .= "Connection Error, contact administrator."; //bottom form message
			header('Location: forgotpassword.php'); //reload forgotpassword page 
		}
		
		//good connection - set token for email reset	
		if (mysqli_num_rows($getByEmail) > 0) {
			$str = "0123456789qwerty";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);
			
			/*--
			--- -- --- WORK FLAG
			--- -- Added a link to pull info from current page for link back. KM -- 8/27 AM
			--- -- Hopefully it will work local or remote server.
			*/
			
		//first get current server
			$server ="//{$_SERVER['SERVER_NAME']}";
			
		//second get current folder
			//gets fullpath
			$url =  "//{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}";
			//parse fullpath
			$path = parse_url($url, PHP_URL_PATH);
			//get curret folder
			$arr = explode("/",$path);
			$folder = "/" . $arr[1];
			
		//path to reset current user password
			$resetPath = "/resetpassword.php/?token=$str&email=$email";
		
		//full link to email user
			$emailLink = $server . $folder . $resetPath;
			$emailLink = htmlspecialchars( $emailLink, ENT_QUOTES, 'UTF-8' );
			
			/*--
			--- -- --- WORK FLAG
			--- Email is working on my local machine. 
			--- If you need echo it out that is in the email.php file at bottom.
			--- It may need adjusting when on server (&& email will need to be configured) KM 
			--- It could also be prettier. Hint hint frontEnd Dev team. :)-- 8/27 AM
			--*/
				
		//send email with token in url link
		//calls email.php 
			emailToken($emailLink, $email);
			
			//echo "http:". $emailLink;
			//set token 
			$updateTokenStr = "UPDATE login SET token='$str' WHERE email='$email'";
			$updateToken = mysqli_query($con, $updateTokenStr);
			
			$_SESSION['ErrorBlock'] = "Success! <br/>Please Check your E-Mail to reset your password."; //bottom form message
			}
		else {
			$_SESSION['ErrorBlock'] = "Check email entered, no user found."; //bottom form message
			}
		//close dB connection
		mysqli_close($con);
	}
?>
<?php
function newPasswordAssign($email, $token, $new_password, $con ){
	$_SESSION = array();
	//include('session.php');
	$_SESSION['ErrorBlock'] = "";	
	//echo $email.$token.$new_password;
	//check that the email token and new password are set
	if (isset($email) && isset($token) && isset($new_password)){
		
		$getLoginIdStr = "SELECT * FROM login WHERE Email='$email' AND Token='$token'";
		$getLoginId = mysqli_query($con, $getLoginIdStr);
		//if(isset($_SESSION)){echo '<pre>'; print_r($getLoginId); echo '</pre>';}//error checking session
		//Session using getLoginId query
		$array3 = mysqli_fetch_array($getLoginId);
		
		//session_regenerate_id();
	
		$_SESSION["LoginID"] = $array3["LoginID"];
		$_SESSION["Email"] = $array3["Email"];
		$_SESSION["Pword"] = $array3["Pword"];
		$_SESSION["Role"] = $array3["Role"];
		$_SESSION["FName"] = $array3["FName"];
		$_SESSION["LName"] = $array3["LName"];
		$_SESSION["Locked"] = $array3["Locked"];
		$_SESSION["Token"] = $array3['TOKEN'];
							
		$login=(int)$_SESSION["LoginID"]; //for selection
		$locked=(int)$_SESSION["Locked"]; //counter for msg
		
		$new_password = sha1($new_password);
		//sets password to new password		
		$new_passwordStr = "UPDATE login SET Pword = '$new_password', Locked = 0, TOKEN = NULL  WHERE LoginID = $login";
		//if(isset($_SESSION)){echo '<pre>'; print_r($new_passwordStr); echo '</pre>';}//error checking session
		$new_password = mysqli_query($con, $new_passwordStr);
		//if(isset($_SESSION)){echo '<pre>'; print_r($new_password); echo '</pre>';}//error checking session
		if($new_password){
			$_SESSION['ErrorBlock'] .= "Please Login."; //bottom form message
			header('Location: ../login.php'); //reload forgotpassword page 
			}
	} 
	//redirect to login with message
	else {
		$_SESSION['ErrorBlock'] = "Your Password could not be reset! <br/> Please retry to reset your password again from the Login Page."; //bottom form message
		header('Location: login.php'); //redirect to login page	
		}
	//close dB connection
	mysqli_close($con);
}
?>