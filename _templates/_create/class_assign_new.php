<!-- ------------- Class Assignment Selection ----------->
<div>
	<?php 
	// ++++ Change updated to check for sending page 10/10 KM ++++
	if(!isset($P) || empty($P)){echo '<div class="error">Where did you come from? Sending page not assigned.</div>';}
	if(!empty($P)){
		//Selection Box - Select from classes
		if($P=='stud_mgmt_pg'){
			$cadd = new Drop_DO();
			$rows=$cadd->allClasses();
			echo '<select name="NewClassID" required>'; // Open
			echo '<option value="none" selected>Select A Class</option>';
			foreach ($rows as $caddo) {
			  echo '<option value="'.$caddo['ClassID'].'">';
			  echo 		$caddo['ClassID'].' '.$caddo['ClassNO'].' '.$caddo['ClassName'];
			  echo '</option>';
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
				echo '<div class = "error">'.$errorMsg.'</div>';
			}
		}//end if stud_mgmt_pg
		
		if($P=='add_student'){
			$errorMsg ='';
			$newClassA = new CA_DO();
			if(!empty($newID) && !empty($ClassID)){					
				$newClassA = new Class_Assign(array( 
				'Subj' => $newID, // Student Assignment
				'LoginID' => $_SESSION['LoginID'], // Current User
				'ClassID' => $ClassID));	
				$newClassA->assignClass();
				echo '<div class = "receipt">Enrolled in Class: <strong><td><a href="class_page.php?cid='.$ClassID.'">'.$ClassID.'</a></strong></div>';
			}
		}	
	}//end if $P
	
		?>
				