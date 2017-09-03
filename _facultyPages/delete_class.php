<?php 
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');

if(isset($_GET['id'])){$ClassID = $_GET['id'];}

	if(!empty($_SESSION['LoginID'] && $ClassID )){
	
	require("../_php/_objects/class_do.php");	
	require("../_php/_models/class_model.php");
	
	//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	//require("$root/_php/_objects/class_do.php");  
	//require("$root/_php/_models/class_model.php");
	
	$classdo = new Class_DO();
	//calls class data object and loads table data by ClassID
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
<main="main">

<table>
<h1> Deleting this Class ?</h1>

	<tr><th>Class ID: </th><td><?php echo $ClassID ;?></td></tr>
	<tr><th>Class Number</th><td><?php echo $ClassNO;?></td></tr>
	<tr><th>Class Name: </th><td> <?php echo $ClassName;?></td></tr>
	<tr><th>Class Expires On:</th><td><?php echo $ExpDate ?></td></tr>
	<tr><th>Semester: </th><td><?php echo $SemesterName ." " . $Year;?></td></tr>
	<tr></tr>

</table>

<form name="DeleteClass" method="POST">
<div>	
<br/>
	<input type="submit" value="Delete Class" name="DeleteClass" id="DeleteClass">
</div>
<?php 
if(isset($_POST['DeleteClass'])){
$newClass = new Classes(array(
	"LoginID" => $_SESSION["LoginID"],
	"ClassID" => $ClassID,
	"ClassNO" => $ClassNO,
	"ClassName" => $ClassName,
	"SemesterID" => $SemesterID,
	"ExpDate" => $ExpDate)
	);
$newClass->deleteClass();
if($newClass){
	header("Location: ../_facultyPages/all_classes.php");
}}
?>

</form>
</main>
<?php include("../_templates/footer.php");?>
</body>
</html>