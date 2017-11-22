<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
// ++++ Change: Added Title 10/25 KM ++++
$title = 'My Classes';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
// ++++ Change: Added Page Identifier 10/10 KM ++++
$P='classes';
?>
<!-- Main Content Section-->
<main>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
		<h1 class="center">Your Classes</h1>
		<br/>
		<div class="row">
			<!-- Builds table for classes. If classes have Expired they are not pulled. KM 9/2/17 -->
			
				<?php 
				if($LoginID!=0){include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/instructor_classes.php'); }?>
				</div>
		</div>
	</div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>
