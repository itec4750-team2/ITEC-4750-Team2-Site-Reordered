<?php 
/*
--- -- --- WORK FLAG
--- Needs Msg that tells user that student is already listed. 
--- Prevent adding student with same lastname + email
--- -- */
// ++++ Change: Added as a stub page 9/24 KM ++++
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_headers/facultyHeader.php');
include($_SERVER['DOCUMENT_ROOT'].'/_templates/_nav/facultyNav.php');
// ++++ Change: Added page identifier 10/10 KM ++++
$P='add_students';
?>
<div class="wrapper">
	<main>
	<p> 
		You have landed on the add_students page.<br/>
		<!--
--- -- --- WORK FLAG
--- This page still needs work. Currently stub for adding multiple students
--- Intend to add an upload to database from csv function for adding multiple students.
--- KM -- 10/7 
-->
		//
	</p>
	</main>
</div><!--End wrapper-->
	
<?php include($_SERVER['DOCUMENT_ROOT'].'/_templates/_footers/facfooter.php');?>
</body>
</html>