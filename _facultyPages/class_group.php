<?php
// ++++ Change: Adjusted indentation 9/7 KM ++++
/* --
--- -- --- WORK FLAG
--- This page still needs work. -- 9/8 KM
--- Currently displays the students assigned to a group.
--- Mostly to check link from class_page.php (Further Development Soon)include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php') 
-- */
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php'); 
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/group_assign_do.php');	
?>	
<!-- Main Content Section-->
<div class="wrapper">
	<main>
		<?php	
		if(isset($_GET['gid']))
			{
				$GroupID = $_GET['gid'];
				$GroupName = $_GET['gname'];
			}
			$gado=new GA_DO(); 
			$rows=$gado->listGroupStuds($GroupID);
			echo '<h1>'.$GroupName.'</h1>';
			echo '<table>';
				foreach ($rows as $value){
					echo '<tr>';
						// ++++ change: took out id linked student mgmt stub to Name ++++ -->
						echo '<td>' . '<a href="stud_mgmt_pg.php?stid=' . $value['LoginID'] . '">' . $value['FName'] . " " . $value['LName'] . '</a></td>';
						// ++++ change: added mail to email link ++++ -->
						echo '<td>' . '<a href="mailto:' . $value['Email'].'">' . $value['Email'] . '</a></td>';
						// ++++ change: added group linked to class_group stub ++++ -->
						echo '<td>' . '<a href="class_page.php?cid=' . $value['ClassID'] . '">' . $value['ClassNO'] . $value['ClassName'].'</a></td>';
					echo "</tr>";
				}
			echo '</table>';
		?>
	</main>
</div><!-- End Wrapper -->	
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>