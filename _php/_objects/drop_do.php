<?php
class Drop_DO{

// Will hold dropboxes

function semSelect(){
include("../_php/config.php");
$sql = "SELECT SemesterID, SemesterName, Year From semester";
$semSelect = mysqli_query($con, $sql);
$all_rows = array();
while($row = mysqli_fetch_array($semSelect)){$all_rows[]=$row;}
return $all_rows;
}

}
?>