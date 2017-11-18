<?php
$classdo = new Class_DO($_SESSION['LoginID']);
$rows=$classdo->loadAll($_SESSION['LoginID']);

/*--
--- -- --- WORK FLAG
--- Would like to use bootstrap afix header to make header sticky. KM
--*/
?>
		<!-- ++++ Change: Added Leave Class Button 9/29 KM ++++-->
		<!-- ++++ Change: Updated Table Styling with bootstrap and style1.css 11/18 KM ++++-->
		<div class="row">
		<div class="col-md-9 col-centered table-responsive">
			<table class="table-responsive">
			<thead>
			<tr>
				<th class="col-sm-1">ID</th>
				<th class="col-sm-2">Number</th>
				<th class="col-sm-5">Name</th>
				<th class="col-sm-1">Semester</th>
				<th class="col-sm-2">Expire Date</th>
				<th class="col-sm-1">Delete <br/> Class</th>
				<th class="col-sm-1">Update <br/> Class</th>
			</tr>
			</thead>
			<tbody>
				<?php
					// -- ++++ Change: Added Delete Class & Update Class Buttons 9/29 KM ++++
					foreach ($rows as $value){
						echo '<tr>';
						echo '<td class="col-sm-1"><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>'; // link to class_page
						echo '<td class="col-sm-2">'.$value['ClassNO'].'</td>';
						echo '<td class="col-sm-5"><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassName'].'</a></td>'; // link to class_page
						echo '<td class="col-sm-1">'.$value['SemesterName']. ' '.$value['Year'].'</td>';
						echo '<td class="col-sm-2">'. $value['ExpDate'].'</td>';
						echo '<td class="col-sm-1"><a href="../_templates/_delete/delete_class.php?cid='.$value['ClassID'].'&p='.$P;
						echo 	'"><img class ="small_icon" src="../_images/delete_class.png" alt="Delete Class"></a></td>'; // delete class
						echo '<td class="col-sm-1"><a href="../_facultyPages/update_class.php?cid='.$value['ClassID'];
						echo 	'"><img class ="small_icon" src="../_images/update.png" alt="Update Class"></a></td>'; // update class
						echo '</tr>';
					}?>
				</tbody></table>
