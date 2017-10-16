<?php
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/stu_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/student_model.php');
$P='update_student';
?>

<div class="wrapper">
	<main>
		<!-- Main Content Section-->
			<?php
			// ++++ Change: Added Check for IDs module 10/8KM ++++
			// Gets IDs
			include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
			if(!empty($_SESSION['LoginID'])){
				if(!isset($Subj) || empty($Subj)){echo '<div class="error">Uhoh problem getting Student ID</div>';}
				if(!empty($Subj)){?>
					<h1> Update Student Profile </h1>
					<!-- <h2> Welcome <?php //echo $FName. ' ' . $LName ; ?> !</h2> -->

					<br/>
					<?php 
						//--------------------------------- Include update-profile ---------------------------->	
						include($_SERVER['DOCUMENT_ROOT'].'/_templates/_update/updateProfile.php');
								
						if(isset($_POST['DeleteProfile'])){				
						$dProfile = new Profile(array(	
							'LoginID' => $_SESSION['LoginID'],
							'Subj' => $Subj,
							'Password' => 'UNK',
							'Email' => $_POST['Email'],
							'FName' => $_POST['FName'],
							'LName' => $_POST['LName']
							));	
							
							$dProfile->deleteProfile();
							// Navigate to classes.php after 
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
<?php					
		}//End If !empty  Subj
	}//End If !empty LoginID 
?>
	</main>
</div><!--End wrapper-->
	
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>