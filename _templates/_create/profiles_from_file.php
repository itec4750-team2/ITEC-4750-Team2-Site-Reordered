<?php
// ++++ Change: Created profiles_from_file 10/15 KM ++++
require($_SERVER['DOCUMENT_ROOT'].'/_php/_objects/profile_do.php');	
require($_SERVER['DOCUMENT_ROOT'].'/_php/_models/profile_model.php');
?>
<div>
<br/>
<br/>
<table>
	<?php
	if(!isset($Role)){$Role='Student';}
	if(!isset($LoginID)){$LoginID=$_SESSION['LoginID'];}
	echo '<tr>';
		echo	'<th>ID</th>';
		echo	'<th>First</th>';
		echo	'<th>Last</th>';
		echo	'<th>Email</th>';
		echo	'<th>Role</th>';
		echo	'<th>Temporary Password</th>';
	echo '</tr>';	
	
	$newFile = new Profile_DO();
	$newFile->newProfiles($Role, $LoginID);
	?>	
</table>
</div>
<div>
<br/>
<br/>

