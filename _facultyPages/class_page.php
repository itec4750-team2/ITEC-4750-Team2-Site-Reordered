<?php 
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
if(isset($_GET['id'])){$ClassID = $_GET['id'];}
	if(!empty($_SESSION['LoginID'] && $ClassID )){
	
	require("../_php/_objects/class_do.php");	
	require("../_php/_models/class_model.php");
	require("../_php/_objects/stu_do.php");

	$classdo = new Class_DO();
	//calls class data object and loads table data by LoginID
	$classpage=$classdo->classPage($ClassID);
		foreach ($classpage as $value){
		$ClassNO = $value['ClassNO'];
		$ClassName=$value['ClassName'];
		$SemesterName=$value['SemesterName'];
		$Year = $value['Year'];
		$ExpDate = $value['ExpDate'];
		$SemesterID = $value['SemesterID'];
		}
?>
	
<!-- Main Content Section-->
<div class="wrapper">
<div id="main">
	<h1> <?php echo $ClassName . " - ". $SemesterName?></h1>
<div>

<table>
<tr><th>Class Item Number</th><td><?php echo $ClassID;?></td></tr>
<tr><th>Class Number</th><td><?php echo $ClassNO;?></td></tr>
<tr><th>Class Name</th><td><?php echo $ClassName;?></td></tr>
<tr><th>Class Expires</th><td><?php echo $ExpDate;?></td></tr>
<tr><th>Semester</th><td><?php echo $SemesterName." ".$Year;?></td></tr>
</table>
<div><br/><br/>
<table>
<tr><class="one"><?php echo '<a href="delete_class.php?id='.$value['ClassID'].'">'."Delete Class </a>
<class='one'><br/><br/>";?><?php echo '<a href="update_class.php?id='.$value['ClassID'].'">'."Update Class</a>";?></tr>
</table><br/><br/></div>
<table>
<tr><th>Student ID</th><th>Student Name</th><th>Email</th></tr>

<?php 
$studo = new Stud_DO();	
$rows=$studo->listClassStuds($_GET['id']);
foreach ($rows as $value){
echo '<tr><td><a href="stud_mgmt_pg.php?id='. $value['LoginID'] . '">'. $value['LoginID'].'</a></td>';
echo "<td>" . $value['FName'] . " " . $value['LName'] . "</td>";
echo "<td>" . $value['Email'] . "</td></tr>"; 
}
?>
</table>
</div>
</div>
<?php }
include("../_templates/footer.php");?>
</body>
</html>