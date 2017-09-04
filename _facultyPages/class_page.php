<?php 
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
if(isset($_GET['id'])){$ClassID = $_GET['id'];}
	if(!empty($_SESSION['LoginID'] && $ClassID )){
	
	require("../_php/_objects/class_do.php");	
	require("../_php/_models/class_model.php");
	
	//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	//require("$root/_php/_objects/class_do.php");  

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
	}

?>
	
<!-- Main Content Section-->
<div class="wrapper">
<div id="main">
	<h1> <?php echo $ClassName . " - ". $SemesterName. " ". $Year?></h1>
<div>

<table>

<tr>
	<th>Class Item Number</th>
	<td><?php echo $ClassID;?></td>
</tr>

<tr>
	<th>Class Number</th>
	<td> <?php echo $ClassNO;?></td>
</tr>

<tr>
	<th>Class Name</th>
	<td><?php echo $ClassName;?></td>
</tr>

<tr>
	<th>Class Expires</th>
	<td><?php echo $ExpDate;?> </td>
</tr>

<tr>
	<th>Semester</th>
	<td><?php echo $SemesterName." ".$Year;?> </td>
</tr>

<tr>
<th class="one">
	<?php echo '<a href="delete_class.php?id='.$value['ClassID'].'">'.'Delete Class</a>';?>
</th>
	<td></td>
</tr>
	<tr></tr>
<tr>
<th class="one">
	<?php echo '<a href="update_class.php?id='.$value['ClassID'].'">'.'Update Class</a>';?>
</th>
	<td></td>
</tr>

</div>
</table>
</div>
</main>

<?php include("../_templates/footer.php");?>
</body>
</html>