<?php
	/*
	-- Will Update to a MVC framework
    -- Clicking Classes from student dashboard runs this script 
    -- This populates table on class_student.php --KM 8/31
	*/

   include('config.php');
   $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
   include('session.php');
   $StuClasses = ""; 
 
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
		$StuClasses .= '<tr>';	
		$StuClasses .= '<td> '. $row['ClassID']. '</td><td>'.$row['ClassNO'].'</td>';
		$StuClasses .= '<td>'. $row['ClassName'].'</td><td>'. $row['SemesterName'].'</td>';
		$StuClasses	.= '<td>'. $row['Year'] .'</td><td>'. $row['ExpDate'].'</tr></td>';
		}
	} else {
		echo "0 results";
	}

	$_SESSION['StuClasses'] = $StuClasses; 
	
	header('Location: ../_studentPages/classes_student.php');
?>