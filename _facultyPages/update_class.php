<?php 
// ++++ Change: Adjusted indentation 9/8 KM ++++
/* --
--- -- --- WORK FLAG
---This page still needs work. Maybe use a <datalist> populated with classes offered. -- 9/8 KM
--- -- */
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
?>
<!-- Main Content Section-->
<div class="wrapper">
	<div id="main">
		<?php
		//--------------------------- Get Class Info ------------------------>
		if(isset($_GET['cid'])){$ClassID = $_GET['cid'];}
		if(!empty($_SESSION['LoginID'] && $ClassID )){
			$classdo = new Class_DO();
			$classpage=$classdo->classPage($ClassID, $_SESSION['LoginID']);
				foreach ($classpage as $value){
					$ClassNO = $value['ClassNO'];
					$ClassName = $value['ClassName'];
					$SemesterName = $value['SemesterName'];
					$Year = $value['Year'];
					$ExpDate = $value['ExpDate'];
					$SemesterID = $value['SemesterID'];
				}//End foreach
		?>
				<h1> Update Class </h1>
				<!---------------------------- Display Class Info --------------------->
				<form name="update-class" method="POST">
					<!-- ++++ Change: Made 'Item Number' a Label. Class item can not be updated. 9/8 KM ++++ -->
					<div>
						<label>Class Item Number: <?php echo '<td><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>';?></h2>
					</div>

					<div>
						<label for="ClassNO">Class Number: </label>
						<input type="text" name="ClassNO" id="ClassNO" placeholder="ITEC Number"  value= <?php echo "'". $ClassNO ."'";?>required>
					</div>

					<div>
						<label for="ClassName">Class Name: </label>
						<input type="text" name="ClassName" id="ClassName" placeholder="Class Name" value= <?php echo "'". $ClassName ."'";?>required>
					</div>

					<div>
						<label for="ExpDate">Class Expires: </label>
						<input type="date" name="ExpDate" id="ExpDate" placeholder="Expiration Date"value= <?php echo "'". $ExpDate ."'";?> required>
					</div>
				
			<!----------------- Semester DropBox ------------>
			<div>
				<!-- ++++ Change: Moved MySql out of page. Replaced with dropbox from drop_do 9/8 KM ++++ -->
				<label for="SemesterID">Semester: </label>	
				<?php
					// -- calls dropdown box  --  drop_do.php
					// -- lists all semesters for instructor to choose from.
					// -- could do similar for class names 
					$dropdo = new Drop_DO($_SESSION['LoginID']);
					$rows=$dropdo->semSelect();
					echo '<select name="SemesterID" required>'; // Open
					echo '<option value="'.$value['SemesterID'].'" selected>'.$value['SemesterName'].' '.$value['Year'].'</option>'; // Auto Select Current Instructor
						foreach ($rows as $ddo) {
						  echo '<option value="'.$ddo['SemesterID'].'">'.$ddo['SemesterName'].' '.$ddo['Year'].'</option>';
						}
					echo '</select>';// Close
				?>
			</div>
			<br/>
			<div><input type="submit" value="Update Class" name="UpdateClass" id="UpdateClass">
				
			<div>	
			<br/>
			<br/>
				<!-- ++++ Change:Added current instructor(s) with dropbox from class_assign_do 9/8 KM ++++ -->
				<table>
					<th> Current Instructor(s): </th>
					<!----------------- Get Current Insts -------------->		
						<?php
						$instr = new CA_DO();
						$facs=$instr->listClassInstrs($value['ClassID']);
						if($facs){
							foreach ($facs as $val){
								$FID = $val['LoginID']; 
								$FName = $val['FName'];
								$LName = $val['LName'];
								echo '<tr>';
									echo '<td>'. $FName .' '. $LName.'</td>';
								echo '</tr>';
							}
						}
						else{
							echo '<tr>';
								echo '<td> No Instructor Listed. </td>';
							echo '</tr>';
						}
						?>
				</table>
			</div>
			
			<br/>
			<div>	
				<!----------------- Current Inst Select -------------->			
				<!-- ++++ Change: Added instructor assignment removal dropbox from class_assign_do 9/8 KM ++++ -->				
				<label for="OFID">Instructor to Remove: </label>	
				<?php
					$instr = new CA_DO();
					$facs=$instr->listClassInstrs($value['ClassID']);
					echo '<select name="OFID" required>'; // Open
					echo '<option value="none" selected>Select Old Instructor</option>'; // Auto Select Current Instructor
						foreach ($facs as $val) {
						  echo '<option value="'.$val['LoginID'].'">'.$val['LoginID'].' '.$val['FName'].' '.$val['LName'].'</option>';
						}
					echo '</select>';// Close					
				?>
				<input type="submit" value="Remove Instructor" name="DelInst" id="DelInst">	
			</div>
			
			<br/>
			<!----------------- Instructor DropBox ------------>
			<div>
				<!-- ++++ Change: Added instructor assignment add dropbox from class_assign_do 9/8 KM ++++ -->
				<label for="FID">Instructor to Add: </label>	
				<?php
					// -- calls dropdown box  --  drop_do.php
					// -- all instructor list
					$facdo = new Drop_DO($_SESSION['LoginID']);
					$rows=$facdo->facSelect();
					echo '<select name="FID" required>'; // Open
					echo '<option value="none"	 selected>Select Instructor</option>'; // Auto Select Current Instructor
						foreach ($rows as $fdo) {
						  echo '<option value="'.$fdo['LoginID'].'">'.$fdo['LoginID'].' '.$fdo['FName'].' '.$fdo['LName'].'</option>';
						}
					echo '</select>';// Close
				?>
				<input type="submit" value="Add Instructor" name="AddInst" id="AddInst">
			</div>
			
			<!--------------- Update Class ------------------>
			<?php 
				if(isset($_POST['UpdateClass'])){			
					$newClass = new Classes(array(
						'LoginID' => $_SESSION['LoginID'], // User
						'ClassID' => $ClassID,
						'ClassNO' => $_POST['ClassNO'],
						'ClassName' => $_POST['ClassName'],
						'SemesterID' => $_POST['SemesterID'],
						'ExpDate' => $_POST['ExpDate']));
					$newClass->upDateClass();
					if($newClass){
						echo "<script>window.open('update_class.php?cid=$ClassID','_self') </script>"; // reloads page to show updated information
					}			
				}
			?>
			<!-- ++++ Change: Added instructor assignment removal from class_assign_do 9/8 KM ++++ -->
			<!--------------- Remove Instructor Assignment ------------------>
			<?php 
				if(isset($_POST['DelInst']) && $_POST['OFID']!='none'){
					$delInst  = new Class_Assign(array(
						'LoginID' => $_SESSION['LoginID'], // User
						'Subj' => $_POST['OFID'], // Class Assign Subject - Previous Instructor
						'ClassID' => $ClassID));
					$delInst->delClassA();
					if($delInst){
						echo "<script>window.open('update_class.php?cid=$ClassID','_self') </script>"; // reloads page to show updated information
					}	
				}
				else if(isset($_POST['DelInst']) && $_POST['FID']=='none'){
					$errorMsg = '<br/><div class="error">Please select instructor to remove.</div>'; 
					echo $errorMsg;
				}
			?>
			<!-- ++++ Change: Added instructor assignment add from class_assign_do 9/8 KM ++++ -->
			<!--------------- Add Instructor Assignment ------------------>
			<?php
				if(isset($_POST['AddInst']) && $_POST['FID']!='none'){	
					$assInst = new Class_Assign(array(
						'LoginID' => $_SESSION['LoginID'], // User
						'Subj' => $_POST['FID'], // Class Assign Subject - New Instructor
						'ClassID' => $ClassID));
					$assInst->assignClass();
					
					if($assInst){
						echo "<script>window.open('update_class.php?cid=$ClassID','_self') </script>"; // reloads page to show updated information
					}			
				}
				else if(isset($_POST['AddInst']) && $_POST['FID']=='none'){
					$errorMsg = '<br/><div class="error">Please select instructor to Add.</div>'; 
					echo $errorMsg;
				}
			?>
		</form>
	<?php }//End If !empty LoginID & ClassID
	else{
		//-- ++++ Change: Added error msg. 9/8 KM ++++ -->
		echo '<div class="error">Uhoh problem getting user login or ClassID</div>';
	}?> 		
	</main>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>
