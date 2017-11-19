<?php	
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
//calls class data object and loads table data by LoginID
if(!isset($StID) || empty($StID)){ echo '<div class="error">No Student ID Found</div>'; }
if(!empty($StID)){
	$classdo = new Class_DO();
	$rows=$classdo->loadByLoginID($StID);
	// ++++ Change: Added if statement to hide table if empty 9/24 KM ++++
	if(empty($rows)){echo '<div> Not currently enrolled in classes.</div>';}
	if(!empty($rows)){
		?>		
		<div class="row">
		<div class="col-md-10 col-centered table-responsive">
			<table class="table-responsive">
			<thead>
			<tr>
				<th class="col-sm-2">Class ID</th>
				<th class="col-sm-2">Class Number</th>
				<th class="col-sm-3">Class Name</th>
				<th class="col-sm-2">Instructor</th>
				<th class="col-sm-1">Semester</th>
				<th class="col-sm-3">Class Expire Date</th>
				<th class="col-sm-1"></th>
			</tr>
			</thead>

			<?php

			//builds table with class data	
			foreach ($rows as $value){
				echo '<tr>';
					echo '<td class="col-sm-2"><a href="class_page.php?cid='.$value['ClassID'].'">';
					echo 	$value['ClassID'].'</a></td>'; // links back to class_page.php
					echo '<td class="col-sm-2">'.$value['ClassNO'].'</td>';
					echo '<td class="col-sm-3"><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassName'].'</td>';
					echo '<td class="col-sm-2">';
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
					echo '<td class="col-sm-1">'.$value['SemesterName'].' '.$value['Year'].'</td>';
					echo '<td class="col-sm-2">'.$value['ExpDate'].'</td>';
					echo '<td class="col-sm-1"><a href="../_templates/_delete/del_class_assignment.php?cid=';
					echo 	$value['ClassID'].'&stid='.$StID.'&p='.$P;
					echo '">';
					echo 	'<img class ="small_icon" src="../_images/person_delete.png" alt="Delete">';
					echo 	'</a></td>'; // delete class assignment
				echo '</tr>';	
			}
			?>
		</table>
	<?php }
	}?>