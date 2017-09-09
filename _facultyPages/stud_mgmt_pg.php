<?php 
// ++++ Change: Adjusted indentation 9/7 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/group_assign_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_assign_model.php');
?>
<div class="wrapper">
	<main>
		<!-- Main Content Section-->
			<?php
			if(!empty($_GET['stid'])){
				$StID = $_GET['stid'];
				}
			else{echo "Uh-oh! - Can't Find the Student ID";}
			if(!empty ($StID)){?>
			<h1> Student Management Page </h1>
			<!-- <h2> Welcome <?php //echo $FName. ' ' . $LName ; ?> !</h2> -->
			<form name ="assign-class" method = "POST" action="#">
			<table>
					<!-- ------------- Student Account Info ----------->
				<?php
					$student = new Stud_DO();	
					$rows=$student->listStud($StID);
						foreach ($rows as $value){
							$FName = $value['FName'];
							$LName = $value['LName'];
							$Email = $value['Email'];		
				?>			
							<tr><th>Student Name</th><td><?php echo  $FName. ' ' . $LName;?></td></tr>
							<tr><th>Student ID </th><td><?php echo $StID;?></td></tr>
							<tr><th>Email</th><td><?php echo '<a href="mailto:' . $Email.'">' . $Email . '</a>';?></td></tr>
				  <?php } ?><!-- Ends student foreach -->  
			</table> 
				<!-- ------------- Student Classes Info ----------->
			<h2>Assigned Classes & Groups</h2>

			<table>
				<tr>
					<th>Class ID</th>
					<th>Class Number</th>
					<th>Class Name</th>
					<th>Instructor</th>
					<th>Semester</th>
					<th>Class Expire Date</th>
					<th></th>
				</tr>

				<?php
				//calls class data object and loads table data by LoginID
				$classdo = new Class_DO();
				$rows=$classdo->loadByLoginID($StID);
				//builds table with class data	
				foreach ($rows as $value){
					echo '<tr>';
						echo '<td><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>'; // links back to class_page.php
						echo '<td>'.$value['ClassNO'].'</td>';
						echo '<td>'.$value['ClassName'].'</td>';
						echo '<td>';
							$instr = new CA_DO();
							$facs=$instr->listClassInstrs($value['ClassID']);
							$i = 0;
							foreach ($facs as $val){
								// ++++ Change: Added | for multiple instructors 9/9 KM ++++
								if($i == 0){
									echo $val['FName']. ' ' .$val['LName'];
								}
								else{
									echo ' | '. $val['FName']. ' ' . $val['LName'];
								}
								$i++;	
							}
						echo'</td>';
						echo '<td>'.$value['SemesterName'].' '.$value['Year'].'</td>';
						echo '<td>'.$value['ExpDate'].'</td>';
						echo '<td><a href="../_php/del_class_assignment.php?cid='.$value['ClassID'].'&stid='.$StID.'">Delete</a></td>'; // delete class assignment
					echo '</tr>';
				}
				?>					
			</table>
			<br/>
				<!-- ------------- Student Group Info ----------->
			<table>
				<?php
					//calls class data object and loads table data by LoginID
					$gado = new GA_DO();
					$rows=$gado->groupsByLogin($StID);

					//builds table with class data	
					foreach ($rows as $value){
						echo '<tr>';
							echo '<td>'.'<a href="class_group.php?gid='.$value['GroupID'].'&gname='.$value['GroupName'].'">'.$value['GroupID'].'</a></td>'; // links back to group page
							echo '<td>'.$value['GroupName'].'</td>';
							echo '<td><a href="../_php/del_group_assignment.php?gid='.$value['GroupID'].'&stid='.$StID.'">Delete</a></td>'; // delete group assignment
						echo '</tr>';
					}
				?>		
			</table>
			<br/>
			<div>
				<!-- ------------- Group Assignment ----------->				
				<?php 
					$gadd = new Drop_DO();
					$rows=$gadd->allGroups();
					echo '<select name="NewGroupID" required>'; // Open
					echo '<option value="none" selected>Select A Group</option>';
					foreach ($rows as $gaddo){
					  echo '<option value="'.$gaddo['GroupID'].'">'.$gaddo['GroupID'].' '.$gaddo['GroupName'].'</option>';
					}
					echo '</select>';
				?>			
				<input type="submit" value="Assign Group" name="ANewGroup" id="ANewGroup">
			</div>
			<br/>	
				<!-- ------------- Class Assignment ----------->
			<div>
				<?php 
				$cadd = new Drop_DO();
				$rows=$cadd->allClasses();
				echo '<select name="NewClassID" required>'; // Open
				echo '<option value="none" selected>Select A Class</option>';
				foreach ($rows as $caddo) {
				  echo '<option value="'.$caddo['ClassID'].'">'.$caddo['ClassID'].' '.$caddo['ClassNO'].' '.$caddo['ClassName'].'</option>';
				}
				echo '</select>';
				?>
				<input type="submit" value="Assign Class" name="ANewClass" id="ANewClass">
			</div>
			</form>
				<!-- ------------- Add Class Assignments ----------->
			
				<?php
				$errorMsg ='';
				$newClassA = new CA_DO();
				if(isset($_POST['ANewClass']) && $_POST['NewClassID']!='none'){	
					$newClassA = new Class_Assign(array( 
					'Subj' => $StID, // Student Assignment
					'LoginID' => $_SESSION['LoginID'], // Current User
					'ClassID' => $_POST['NewClassID']));	
					$newClassA->assignClass();
					echo "<script>window.open('stud_mgmt_pg.php?stid=$StID','_self') </script>"; // reloads page to show updated information
				}
				else if(isset($_POST['ANewClass']) && $_POST['NewClassID']=='none'){
					$errorMsg = 'Please select a class.'; 
					echo $errorMsg;
				}
				?>
				<!-- ------------- Add Group Assignments ----------->
				<?php
				$newGroupA = new GA_DO();
				$errorMsg2 ='';

				if(isset($_POST['ANewGroup']) && $_POST['NewGroupID']!='none'){	
					$newGroupA = new Group_Assign(array( 
					'StID' => $StID, // Student
					'LoginID'=>$_SESSION['LoginID'], // Current User
					'GroupID' => $_POST['NewGroupID']));	
					$newGroupA->assignGroup();
					echo "<script>window.open('stud_mgmt_pg.php?stid=$StID','_self') </script>"; // reloads page to show updated information
				}
				else if(isset($_POST['ANewGroup']) && $_POST['NewGroupID']=='none'){
					$errorMsg2 = 'Please select a group.'; 
					echo $errorMsg2;
				}
			} // End if StID not empty
			else{
				echo 'Uhoh No StudentID.';
			}?>
	</main>
</div><!--End wrapper-->
	
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>
