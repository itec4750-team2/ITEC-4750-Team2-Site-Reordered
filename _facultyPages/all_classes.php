<?php
// ++++ Change: Adjusted indentation 9/8 KM ++++
// ++++ Change: Added Title 10/25 KM ++++
$title = 'All Classes';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
// ++++ Change: Added page identifier 10/10 KM ++++
$P='all_classes';
?>
<h2 class="center">ITEC Classes</h2>
<!-- Builds table for classes. If classes have Expired the are not pulled. KM 9/2/17 -->
<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
	<?php
	// ++++ Change: Added Check for IDs module 10/12 KM ++++

	// Gets IDs
	include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
		
	if($LoginID !=0){ // If logged in
		// ++++ Change: Moved to templates for consistency 11/18 KM ++++
		include($_SERVER['DOCUMENT_ROOT'].'/_templates/_read/all_classes.php');
	} // End if faculty logged in.
	?>
	</div>
	</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>