<?php 
// ++++ Change: Adjusted indentation 9/8 KM ++++
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
require('../_php/_objects/class_do.php');
?>
<!-- Main Content Section-->
<div class="wrapper">
	<!-- Builds all classes table. If classes have Expired the are not pulled. KM 9/2/17 -->
	<main>
		<h2 class="center">ITEC Classes</h2>
		<?php
		if(isset($_SESSION['LoginID'])){		
			$classdo = new Class_DO($_SESSION['LoginID']);		
			$rows=$classdo->loadAll($_SESSION['LoginID']);
		?>
			<table>
				<tr>
					<th>Class ID</th>
					<th>Class Number</th>
					<th>Class Name</th>
					<th>Semester</th>
					<th>Class Expire Date</th>
				</tr>
		<?php
				foreach ($rows as $value){
					echo '<td><a href="class_page.php?cid='.$value['ClassID'].'">'.$value['ClassID'].'</a></td>'; // link to class_page
					echo '<td>'.$value['ClassNO'].'</td><td>'.$value['ClassName'].'</td>';
					echo '<td>'.$value['SemesterName']. ' '.$value['Year'].'</td>';
					echo '<td>'. $value['ExpDate'].'</td></tr>';
				}
	  echo '</table>';		
		} // End if faculty logged in. 
		// ++++ Change: Added error msg for no $_SESSION['LoginID'] 9/8 KM ++++
		else{
			echo '<div class = "error"> Only faculty can view this page. <br/> Please log in... </div>';
		}
		?>			   
	</main>
</div> <!-- End Wrapper -->
<?php include('../_templates/facfooter.php');?>
</body>
</html>