
<form action="indvResults.php" method="post" id="loginForm">
<table>
<tr>
<td>
<?php
	$sql=mysql_query("SELECT StudentID,FName,LName FROM Student ");
	if(mysql_num_rows($sql))
	{
		$select= '<select name="selecting">';
		while($rs=mysql_fetch_array($sql))
		{
			$select.='<option value="'.$rs['StudentID'].'">'.$rs['FName']." ".$rs['LName'].'</option>';
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
</form>