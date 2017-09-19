<?php 
// ++++ Change: Adjusted indentation 9/7 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');
// ++++ Change: Moved to this procedure to class_assign_do (previously part of stu_do) 9/5 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_assign_do.php');
?>
<!-- Main Content Section-->
<div class="wrapper">
	<main>
		<?php 
			if(isset($_GET['cid'])){
				$ClassID = $_GET['cid'];
				}
			if(!empty($_SESSION['LoginID'] && $ClassID )){
				// --------------- Class Information -------------
				// ++++ Change: Passed currently selected ClassID & $_SESSION['LoginID'] ++++
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
		?>	
			<!-- ++++ change: added the word Semester to heading ++++ 9/5 KM-->
			<h1> <?php echo $ClassName . ' - '. $SemesterName . ' Semester' ?></h1>
				<div>
					<table>
						<!-- Gives Class Information Recap -->
						<tr><th>Class Item Number</th><td><?php echo $ClassID;?></td></tr>
						<tr><th>Class Number</th><td><?php echo $ClassNO;?></td></tr>
						<tr><th>Class Name</th><td><?php echo $ClassName;?></td></tr>
						<tr><th>Class Expires</th><td><?php echo $ExpDate;?></td></tr>
						<tr><th>Semester</th><td><?php echo $SemesterName.' '.$Year;?></td></tr>
						<!-- ++++ change: Added faculty name to table +++ 9/5 KM-->
						<tr>
							<th>Faculty Name</th>
							<?php
							// ----------------- Get Current Insts --------------
								$instr = new CA_DO();
								$facs=$instr->listClassInstrs($value['ClassID']);
								if($facs){
									$i=0;
									foreach ($facs as $val){
										$FID = $val['LoginID']; 
										$FName = $val['FName'];
										$LName = $val['LName'];
										if($i==0){ // First instructor
											echo '<td>'. $FName .' '. $LName.'</td>';
										}
										else{ //In case of multiple instructors.
											echo '<tr>';
											echo '<th></th>';
											echo '<td>'. $FName .' '. $LName.'</td>';
											echo '</tr>';
											}
										$i++;
									}
								}
								else{
									echo '<td> No Instructor Listed. </td>';
								}
							?>
					</tr>
					</table>
					<br/>
					<br/>
					<table>
						<tr>
							<?php 
								//Update and Delete class links.
								echo '<a href="delete_class.php?cid='.$value['ClassID'].'">'.'Delete Class </a>'; // delete class
								echo '<br/><br/>';
								echo '<a href="update_class.php?cid='.$value['ClassID'].'">'.'Update Class</a>'; // update class
							?>
						</tr>
					</table>
				</div>
				<br/>
				<br/>
				<table>
					<!-- ++++ Change: Took out student's id and added group 9/5 KM ++++ -->
					<th>Student Name</th><th>Email</th><th>Group</th></tr>
					<?php 
						// Lists student's assigned to a class.
						// ++++ Change: Moved to class_assign_do from stu_do 9/5 KM ++++
						$cado = new CA_DO();
						$rows=$cado->listClassStuds($ClassID);
						foreach ($rows as $value){
							echo '<tr>';
								// ++++ Change: Took out id & linked student_mgt_pg to Name 9/5 KM ++++ 
								echo '<td>' . '<a href="stud_mgmt_pg.php?stid=' . $value['LoginID'] . '">' . $value['FName'] . ' ' . $value['LName'] . '</a></td>'; // links to student_mgt_pg for this student
								// ++++ Change: Added mail to email link 9/5 KM ++++ 
								echo '<td>' . '<a href="mailto:' . $value['Email'].'">' . $value['Email'] . '</a></td>';
								// ++++ Change: Added group linked to class_group stub (to be developed soon) 9/5 KM ++++ 
								echo '<td>' . '<a href="class_group.php?gid='.$value['GroupID'].'&gname='.$value['GroupName'].'">' . $value['GroupName'] . '</a></td>'; // links to group page for this group
							echo '</tr>';
						}	
					?>
				</table>
		<?php }?>	
	</main>
</div><!--End Wrapper -->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>