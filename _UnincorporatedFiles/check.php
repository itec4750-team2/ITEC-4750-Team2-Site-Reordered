<!--  This webpage does not do anything when loaded into a browser. It is used for DB interfacing only. -->

<?php
/* Calls db.php and assigns values. */
require_once("db.php");
function check_input($r){
 $r=trim($r);
 $r=strip_tags($r);
 $r=stripslashes($r);
 return $r;
 }

 /* Sets values for username/password and checks inputs. */
if (isset($_POST['Email'],$_POST['Pword'])){
 
 $u=check_input($_POST['Email']);
 $p=check_input($_POST['Pword']);
 
 /* Passes login info for verification, then assigns access based on if user is a student or faculty. */
 try{
 $db=get_db();
 $stmt=$db->prepare("SELECT * FROM login WHERE id=? && Pword=?");
 $stmt->execute(array($u));
 $r=$stmt->fetch(PDO::FETCH_ASSOC);
 if($r){
  session_start();
  $access_level=$r['access_level'];
  $_SESSION['id']=$r['id'];
  $_SESSION['access_level']=$access_level;
  if ($access_level==0){
   header("Location:studentDashboard.php");
   }
  else if($access_level==1){
   header("Location:facultyDashboard.php");
   }
  }
 else{
  header("Location:index.php?err=1");
  }
 }
 
 /* Exception handler. */
 catch(PDOException $e){
  die("Database error: ".$e->getMessage());
 }
}

?>