<?php	
//calls class data object and loads table data by LoginID
$classdo = new Class_DO();
$rows=$classdo->loadByLoginID($StID);
// ++++ Change: Added if statement to hide table if empty 9/24 KM ++++
if(empty($rows)){echo '<div> Not currently enrolled in classes.</div>';}
if(!empty($rows)){
	?>		
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

		//builds table with class data	
		foreach ($rows as $value){
			echo '<tr>';
				echo '<td><a href="class_page.php?cid='.$value['ClassID'].'">';
				echo 	$value['ClassID'].'</a></td>'; // links back to class_page.php
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
				echo '<td><a href="../_templates/_delete/del_class_assignment.php?cid=';
				echo 	$value['ClassID'].'&stid='.$StID.'&p='.$P;
				echo '">';
				echo 	'<img class ="small_icon" src="../_images/delete.png" alt="Delete">';
				echo 	'</a></td>'; // delete class assignment
			echo '</tr>';	
		}
		?>
	</table>
<?php }?>