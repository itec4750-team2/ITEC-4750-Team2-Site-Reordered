<?php 
	// ++++ Change: Adjusted indentation 9/7 KM ++++
/* --
--- -- --- WORK FLAG
---This page still needs work. I would like to have it prevent resubmitting the form. -- 9/7 KM
--- -- */
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
	require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');	
	require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');
?>
<!-- Main Content Section-->
<div class="wrapper">
	<main>
		<?php	
		//----------------- Get Class Info --------------->	
		if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
		if(!empty($_SESSION['LoginID'] && $ClassID )){
			//calls class data object and loads table data by ClassID
			$classdo = new Class_DO();
			$classpage=$classdo->classPage($ClassID, $_SESSION['LoginID']);
			foreach ($classpage as $value){
				$ClassNO = $value['ClassNO'];
				$ClassName=$value['ClassName'];
				$SemesterName=$value['SemesterName'];
				$Year = $value['Year'];
				$ExpDate = $value['ExpDate'];
				$SemesterID = $value['SemesterID'];
			}				
		?>	<!---------------- Show Class Info -------------->
		<table>
			<h1> Deleting this Class ?</h1>
			<tr><th>Class ID: </th><td><?php echo $ClassID ;?></td></tr>
			<tr><th>Class Number</th><td><?php echo $ClassNO;?></td></tr>
			<tr><th>Class Name: </th><td> <?php echo $ClassName;?></td></tr>
			<tr><th>Class Expires On:</th><td><?php echo $ExpDate ?></td></tr>
			<tr><th>Semester: </th><td><?php echo $SemesterName .' ' . $Year;?></td></tr>
			<tr></tr>
		</table>

		<form name="DeleteClass" method="POST">
			<div>	
				<br/>
				<input type="submit" value="Delete Class" name="DeleteClass" id="DeleteClass">
			</div>
			<?php 
				// -----------------Delete Class --------------------
				if(isset($_POST['DeleteClass'])){
					$newClass = new Classes(array(
						'LoginID' => $_SESSION['LoginID'],
						'ClassID' => $ClassID,
						'ClassNO' => $ClassNO,
						'ClassName' => $ClassName,
						'SemesterID' => $SemesterID,
						'ExpDate' => $ExpDate));
					$newClass->deleteClass();
					if($newClass){
						echo '<br/>Success! <br/>You have deleted '.$value['ClassID']. ' ' .$value['ClassName'];
						echo '<br/>Do not resubmit the form.</br>';
					}
				}
		}//End If !empty LoginID & ClassID
		else{
			echo '<div class="error">Uhoh problem getting user login or ClassID</div>';
		}
		?> 		
		</form>
	</main>
</div> <!-- End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>