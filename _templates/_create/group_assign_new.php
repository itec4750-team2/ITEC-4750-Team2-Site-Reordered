
<div class="form-group">
	<div class="col-sm-9">
<?php
// ++++ Change updated to check for sending page 10/10 KM ++++
// ++++ Change: Added Check for IDs module 10/8KM ++++

// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');

if(!isset($P) || empty($P)){echo '<div class="error">Where did you come from? Sending page not assigned</div>';}
	if(!empty($P)){
		//Selection Box - Select from classes
		if($P=='stud_mgmt_pg'){
			$gadd = new Drop_DO();
			$rows=$gadd->allGroups();
			echo '<select name="NewGroupID" class="form-control" required>'; // Open
			echo '<option value="none" selected>Select A Group</option>';
			foreach ($rows as $gaddo){
			  echo '<option value="'.$gaddo['GroupID'].'">';
			  echo 	  $gaddo['GroupID'].' '.$gaddo['GroupName'].'</option>';
			}
			echo '</select>';
?>
	</div>
		<div class="col-sm-3">
			<input type="submit" value="Assign Group" name="ANewGroup" id="ANewGroup" class="btn btn-primary btn-md submit">
		</div>
</div> <!-- End form group div -->
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
		}
	}//End P