<?php 
	$gadd = new Drop_DO();
	$rows=$gadd->allGroups();
	echo '<select name="NewGroupID" required>'; // Open
	echo '<option value="none" selected>Select A Group</option>';
	foreach ($rows as $gaddo){
	  echo '<option value="'.$gaddo['GroupID'].'">';
	  echo 	  $gaddo['GroupID'].' '.$gaddo['GroupName'].'</option>';
	}
	echo '</select>';
?>			
<input type="submit" value="Assign Group" name="ANewGroup" id="ANewGroup">
<!-- ------------- Add Group Assignments ----------->
<?php
$newGroupA = new GA_DO();
$errorMsg2 ='';
if(isset($_POST['ANewGroup']) && $_POST['NewGroupID']!='none'){	
	$newGroupA = new Group_Assign(array( 
	'Subj' => $StID, // Student
	'LoginID'=>$_SESSION['LoginID'], // Current User
	'GroupID' => $_POST['NewGroupID']));	
	$newGroupA->assignGroup();
	echo "<script>window.open('stud_mgmt_pg.php?stid=$StID','_self')";
	echo 	"</script>"; // reloads page to show updated information
}
else if(isset($_POST['ANewGroup']) && $_POST['NewGroupID']=='none'){
	$errorMsg2 = 'Please select a group.'; 
	echo '<div class = "error">'.$errorMsg2.'</div>';
}