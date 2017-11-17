<?php
/* --
--- -- --- WORK FLAG
--- This page still needs work. Maybe use a <datalist> populated with classes offered. -- 9/8 KM
--- Needs Msg that tells user that class is already listed.
--- -- */
// ++++ Change: Added Title 10/25 KM ++++
$title = 'Add Class';
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
include($_SERVER['DOCUMENT_ROOT'].'/_php/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/class_model.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/class_do.php');
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/drop_do.php');
// ++++ Change: Added page identifier 10/10 KM ++++
$P='add_class';
// ++++ Change: Added Check for IDs module 10/12KM ++++

// Gets IDs
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/getIDs.php');
?>

<!-- Main Content Section-->
<main>
	<div class="container-fluid" style="padding: 20px 0px 15px 0px;">
		<?php 
		//++++ Change moved code to template  11/16 KM++++
		include($_SERVER['DOCUMENT_ROOT'].'/_templates/_create/add_class.php');?>
	</div>
</main>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>