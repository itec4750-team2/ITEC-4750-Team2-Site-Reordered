<?php 
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');
if(isset($_GET['id'])){$ClassID = $_GET['id'];}
	if(!empty($_SESSION['LoginID'] && $ClassID )){
	
	require("../_php/_objects/class_do.php");	
	require("../_php/_models/class_model.php");
	include("../_php/config.php");
	
	//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	//include("$root/_php/config.php");
	//require("$root/_php/_objects/class_do.php");  
	//require("$root/_models/class_model.php");
	
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
<h1> Update Class </h1>
<form name="update-class" method="POST">

<div>
	<label for="ClassID">Class Item Number</label>
	<input type="number" name="ClassID" id="ClassID" placeholder="Item Number" value= <?php echo "'". $ClassID ."'";?>required>
</div>

<div>
	<label for="ClassNO">Class Number</label>
	<input type="text" name="ClassNO" id="ClassNO" placeholder="ITEC Number"  value= <?php echo "'". $ClassNO ."'";?>required>
</div>

<div>
	<label for="ClassName">Class Name</label>
	<input type="text" name="ClassName" id="ClassName" placeholder="Class Name" value= <?php echo "'". $ClassName ."'";?>required>
</div>

<div>
	<label for="ExpDate">Class Expires</label>
	<input type="date" name="ExpDate" id="ExpDate" placeholder="Expiration Date"value= <?php echo "'". $ExpDate ."'";?> required>
</div>
<div>
	<label for="SemesterID">Semester ID</label>
	<input type="text" name="SemesterID" id="SemesterID" placeholder="Semester"value= <?php echo "'". $SemesterID."'";?> required>
</div>

<label for="SemIDLookup">Lookup Semester ID</label>

<?php
// -- It's not pretty but it works.
// -- Dropdown needs to be put into function. KM 9/3/17

$sql = "SELECT SemesterID, SemesterName, Year From semester";
$semSelect = mysqli_query($con, $sql);
echo '<select name="SemIDLookup">'; // Open
// Loop to echo options
while($row = mysqli_fetch_array($semSelect)){
	echo '<option value="'.$row['SemesterID'].'">' .$row['SemesterName']." ".$row['Year'].' - Semester ID = '.$row['SemesterID'].'</option>';
}
echo '</select>';// Close
?>

<div class="one">
<input type="submit" value="Update Class" name="UpdateClass" id="UpdateClass">
</div>
</div>

<?php 
if(isset($_POST['UpdateClass'])){
$newClass = new Classes(array(
	"LoginID" => $_SESSION["LoginID"],
	"ClassID" => $_POST['ClassID'],
	"ClassNO" => $_POST['ClassNO'],
	"ClassName" => $_POST['ClassName'],
	"SemesterID" => $_POST['SemesterID'],
	"ExpDate" => $_POST['ExpDate'])
	);
$newClass->upDateClass();

if($newClass){
	header("Location: ../_facultyPages/all_classes.php");
}}
?>

</main>
</form>
<?php include("../_templates/footer.php");?>
</body>
</html>