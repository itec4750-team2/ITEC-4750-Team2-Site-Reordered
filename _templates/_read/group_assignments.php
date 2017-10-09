<?php 
// ++++ Change: Added Reusable Module to list students. 9/30 KM ++++
// GA_DO is called from originating page.
?>	

<?php	
// Lists student's assigned to a class.
// ++++ Change: Moved to class_assign_do from stu_do 9/5 KM ++++
// ++++ Change: Added if statement to hide table if empty 9/24 KM ++++
if(isset($_GET['cid'])&& $ClassID!='all'){$ClassID = $_GET['cid'];}
if(isset($_SESSION['LoginID'])){
	 if(!empty($ClassID )){
	
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
						echo '<td><a href="../_templates/_delete/del_group_assignment.php?gid='.$value['GroupID'].'&stid='.$Subj;
						echo	'"><img class ="small_icon" src="../_images/delete.png" alt="Delete"></a></td>'; // delete group assignment
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
	   
		<?php }}// End IF Login && ClassID 
if(empty($ClassID)){echo "No ClassID Found.";}
if(empty($_SESSION['LoginID'])){ echo '<a href="/login.php"'.'>Please Login</a>';}?>