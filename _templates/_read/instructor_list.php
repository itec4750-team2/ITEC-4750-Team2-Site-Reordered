<div>
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