<div class="row">
<div class="col-md-9 col-centered table-responsive">
	<table class="table-responsive">
		<thead>
			<tr>
				<th class="col-sm-1">ID</th>
				<th class="col-sm-2">Number</th>
				<th class="col-sm-5">Class Name</th>
				<th class="col-sm-1">Semester</th>
				<th class="col-sm-2">Expires Date</th>
				<!-- ++++ Change: Added Leave Class 9/29 KM ++++-->
				<th class="col-sm-1">Leave <br/> Class</th>
				<th class="col-sm-1">Delete <br/> Class</th>
				<th class="col-sm-1">Update <br/> Class</th>
			</tr>
		</thead>
		<tbody>
		<?php
		// ------------- Get Class Data --------------
		$classdo = new Class_DO();
			$rows=$classdo->loadByLoginID($_SESSION['LoginID']);
			// ------------- User's (faculty) Class Info Table ------------
			foreach ($rows as $value){
				echo '<tr>';
				echo '<td class="col-sm-1"><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>'; // links back to class_page.php
				echo '<td class="col-sm-2">'.$value['ClassNO'].'</td>';
				echo '<td class="col-sm-5"><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassName'].'</a></td>'; // links back to class_page.php
				echo '<td class="col-sm-1">'.$value['SemesterName'].' '.$value['Year'].'</td>';
				echo '<td class="col-sm-2">'.$value['ExpDate'].'</td>';
				// -- ++++ Change: Added Leave Class (un-assign), Delete Class, Update Class Buttons 9/29 KM ++++
				echo '<td class="col-sm-1"><a href="../../_templates/_delete/del_class_assignment.php?cid='.$value['ClassID'].'&fid='.$_SESSION['LoginID'].'&p='.$P;
				echo 	'"><img class ="small_icon" src="../_images/person_delete.png" alt="Remove Yourself"></a></td>'; // delete class assignment
				echo '<td class="col-sm-1"><a href="../../_templates/_delete/delete_class.php?cid='.$value['ClassID'].'&p='. $P;
				echo 	'"><img class ="small_icon" src="../_images/delete.png" alt="Delete Class"></a></td>'; // delete class
				echo '<td class="col-sm-1"><a href="../_facultyPages/update_class.php?cid='.$value['ClassID'].'&p='.$P;
				echo 	'"><img class ="small_icon" src="../_images/update.png" alt="Update Class"></a></td>'; // update class
				echo '</tr>';
			}

		?>
		</tbody>
	</table>