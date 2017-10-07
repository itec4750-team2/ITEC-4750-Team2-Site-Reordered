<?php 
// ++++ Change: Adjusted indentation 9/8 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
$P='classes';	
?>
<!-- Main Content Section-->
<div class="wrapper">

	<!-- Builds table for classes. If classes have Expired they are not pulled. KM 9/2/17 -->
	<main>
		<h2 class="center">Your Classes</h2>
		<table>
			<tr>
				<th>Class ID</th>
				<th>Class Number</th>
				<th>Class Name</th>
				<th>Semester</th>
				<th>Class <br/> Expires</th>
				<!-- ++++ Change: Added Leave Class 9/29 KM ++++-->
				<th>Leave <br/> Class</th>
				<th>Delete <br/> Class</th>
				<th>Update <br/> Class</th>
			</tr>
			<?php
			// ------------- Get Class Data --------------
			if(isset($_SESSION['LoginID'])){
				$classdo = new Class_DO();
				$rows=$classdo->loadByLoginID($_SESSION['LoginID']);
				// ------------- User's (faculty) Class Info Table ------------
				foreach ($rows as $value){
					echo '<tr>';
					echo '<td><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>'; // links back to class_page.php
					echo '<td>'.$value['ClassNO'].'</td>';
					echo '<td>'.$value['ClassName'].'</td>';
					echo '<td>'.$value['SemesterName'].' '.$value['Year'].'</td>';
					echo '<td>'.$value['ExpDate'].'</td>';
					// -- ++++ Change: Added Leave Class (un-assign), Delete Class, Update Class Buttons 9/29 KM ++++
					echo '<td><a href="../_php/del_class_assignment.php?cid='.$value['ClassID'].'&fid='.$_SESSION['LoginID'];
					echo 	'"><img class ="small_icon" src="../_images/person_delete.png" alt="Remove Yourself"></a></td>'; // delete class assignment
					echo '<td><a href="../_facultyPages/delete_class.php?cid='.$value['ClassID'].'&p='. $P;
					echo 	'"><img class ="small_icon" src="../_images/delete.png" alt="Delete Class"></a></td>'; // delete class
					echo '<td><a href="../_facultyPages/update_class.php?cid='.$value['ClassID'];
					echo 	'"><img class ="small_icon" src="../_images/update.png" alt="Update Class"></a></td>'; // update class
					echo '</tr>';
				}
			}
			?>			   
		</table>	
	</main>
</div> <!--End Wrapper-->
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
