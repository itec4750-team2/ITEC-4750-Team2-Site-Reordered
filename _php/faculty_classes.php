<?php

   //Call when ??

   include('config.php');
   $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   include('session.php');
   $FacClasses = ""; 
   if(!empty('$Role')){echo $Role. '<br/>';} //Testing
   if(!empty('$FName')){echo $FName . " " . $LName. '<br/>';}//Testing
   if(!empty('$LoginID')){echo $LoginID. '<br/>';}//Testing
   
   if(!$con ) {
      die('Could not connect: ' . mysqli_connect_error_error());
   }

  // $getClassStr = "SELECT * FROM class WHERE LoginID = '$LoginID'";
  // $getClass = mysqli_query($con, $getClassStr);
  
  
    $getClassStr = "SELECT * 
	FROM class 
	Inner Join semester 
	ON class.SemesterID = semester.SemesterID 
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
	echo $FacClasses;
	$_SESSION['FacClasses'] = $FacClasses;
	
	header('Location: ../_facultyPages/classes.php');
	
   
?>