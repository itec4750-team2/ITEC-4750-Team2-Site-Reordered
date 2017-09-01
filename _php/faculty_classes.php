<?php
   /*
   -- Will Update to a MVC framework
   -- Clicking Classes from faculty dashboard runs this script 
   -- This populates table on class.php --KM 8/31
   */

   include('config.php');
   $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   include('session.php');
   $FacClasses = ""; 
   
   if(!$con ) {
      die('Could not connect: ' . mysqli_connect_error_error());
		}
  
    $getClassStr = "SELECT * 
	FROM((class
	INNER JOIN class_assign ON class.ClassID=class_assign.ClassID)
	INNER JOIN semester ON semester.SemesterID=class.SemesterID)
	WHERE LoginID = '$LoginID'";
	
    $getClass = mysqli_query($con, $getClassStr);
    
   //Putin Error Catch
   //if{}else{}
	
    if (mysqli_num_rows($getClass) > 0) {
    // output data of each row
		while($row = mysqli_fetch_assoc($getClass)) {
		$FacClasses .= '<tr>';	
		$FacClasses .= '<td> '. $row['ClassID']. '</td><td>'.$row['ClassNO'].'</td>';
		$FacClasses .= '<td>'. $row['ClassName'].'</td><td>'. $row['SemesterName'].'</td>';
		$FacClasses	.= '<td>'. $row['Year'] .'</td><td>'. $row['ExpDate'].'</tr></td>';
		}
	} else {
		echo "0 results";
	}
	
	$_SESSION['FacClasses'] = $FacClasses; 
	
	header('Location: ../_facultyPages/classes.php');
?>