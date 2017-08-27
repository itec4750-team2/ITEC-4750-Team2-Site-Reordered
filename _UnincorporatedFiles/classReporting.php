<!-- This page seems to only interface with the database. -->
<form action="classResults.php" method="post" id="loginForm">
<table>
<tr>
<td>
<?php /* This calls the database and pulls the data. */
	$sql=mysql_query("SELECT ClassID,ClassName,Semester FROM class ");
	if(mysql_num_rows($sql))
	{
		$select= '<select name="selecting">';
		while($rs=mysql_fetch_array($sql))
		{
			$select.='<option value="'.$rs['ClassID'].'">'.$rs['ClassName']." ".$rs['Semester'].'</option>';
		}
	}
	$select.='</selecting>';
	echo $select;
?>
</td>
<td>
<div class="one"><input type="submit" value="Query DB" name="submitEval" id="submitEval"></div>
</td>
</tr>
</table>