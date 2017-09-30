<?php
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/student_model.php');
?>

<div class="wrapper">
	<main>
		<!-- Main Content Section-->
			<?php
			if(!empty($_GET['stid'])){
				$Subj = $_GET['stid'];
				}
			else{echo "Uh-oh! - Can't Find the Student ID";}
			if(!empty ($Subj)){?>
			<h1> Update Student Profile </h1>
			<!-- <h2> Welcome <?php //echo $FName. ' ' . $LName ; ?> !</h2> -->

			<br/>
			<?php 
				//--------------------------------- Include update-profile ---------------------------->	
				include($_SERVER['DOCUMENT_ROOT'].'/_templates/updateProfile.php');
						
				if(isset($_POST['DeleteProfile'])){				
				$dProfile = new Profile(array(	
					'LoginID' => $_SESSION['LoginID'],
					'Subj' => $Subj,
					'Email' => $_POST['Email'],
					'FName' => $_POST['FName'],
					'LName' => $_POST['LName']
					));	
					
					$dProfile->deleteStudent();
					// Reload page with updated info.
					if($dProfile){
						echo "<script>window.open('classes.php', '_self')</script>";
					}
				}
			?>	
			<table>
			<tr>
				<?php
					$StID = $Subj;
					// ---------------- Password Reset via Emai ------------->
					include($_SERVER['DOCUMENT_ROOT'].'/_templates/forgotpassword.php'); 
				?>	
			</tr>
			</table> 			
			<?php }// End If !empty($_GET['stid'] ?>
	</main>
</div><!--End wrapper-->
	
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/facfooter.php');?>
</body>
</html>