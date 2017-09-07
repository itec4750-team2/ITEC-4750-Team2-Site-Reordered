<?php
function semSelect{
$sql = "SELECT SemesterID, SemesterName, Year From semester";
$semSelect = mysqli_query($con, $sql);
$all_rows = array();
while($row=mysql_fetch_array($semSelect){$all_rows[]=$row;}
return $all_rows;
}

?>

<?php
$rows=$dropdo->semSelect();
foreach ($rows as $ddo) {
  echo ($ddo == $SemesterID) ? "<option selected=\"selected\" value=\"$ddo\">$ddo</option>" : "<option value=\"$ddo\">$ddo</option>";
}  
 ?> 
  
<select name="Semester ID">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select>