<?php 
// ++++ Change: Added Reusable Module to list students. 9/30 KM ++++
// GA_DO is called from originating page.
?>	

<?php	
// Lists groups assigned to a student.
// ++++ Change: Added Check for IDs module 10/8KM ++++
// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
if($LoginID != 0){ //Logged In
	if(!isset($ClassID) || empty($ClassID)){echo '<div class="error">No ClassID Found.</div>';}
	if(!empty($ClassID) && ($ClassID != 'all')){ $_GET['cid'];}	
		$gado = new GA_DO();
		$rows=$gado->groupsByLogin($Subj, $ClassID);
		if($ClassID == 'all'){
			if(!empty($rows)){
?>	
			<!-- <th>Group</th></tr> -->
			<?php 	
				echo '<table>';											
					foreach ($rows as $value){
					echo '<tr>';		
						echo '<td>'.'<a href="class_group.php?gid='.$value['GroupID'].'&gname='.$value['GroupName'].'">';
						echo 	$value['GroupID'].'</a></td>'; // links back to group page
						echo '<td>'.$value['GroupName'].'</td>';
						echo '<td><a href="../_templates/_delete/del_group_assignment.php?gid='.$value['GroupID'].'&stid='.$Subj.'&p='.$P;
						echo	'"><img class ="med_icon" src="../_images/person_delete.png" alt="Delete"></a></td>'; // delete group assignment
					echo '</tr>';
					}
				echo '</table>';	
			}	
		}
		else{
			if(!empty($rows)){
					foreach ($rows as $value){
						// ++++ Change: Added group linked to class_group stub (to be developed soon) 9/5 KM ++++ 
							echo '<td>' . '<a href="class_group.php?gid='.$value['GroupID'].'&gname='.$value['GroupName'].'">';
							echo   $value['GroupName'] . '</a></td>'; // links to group page for this group
					}	
				}
			else { echo '<td></td>';}
		}
		
	  ?>
	   
		<?php }// End IF Login && ClassID 
