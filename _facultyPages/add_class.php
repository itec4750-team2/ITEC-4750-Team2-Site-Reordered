<?php 
include('../_templates/facultyHeader.php');
include('../_templates/facultyNav.php');

include("../_php/config.php");
require("../_php/_models/class_model.php");	
require("../_php/_objects/class_do.php");

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//require("$root/_php/_models/class_model.php"); 
//require("$root/_php/_objects/class_do.php"); 
//include("$root/_php/config.php");

?>
	
<!-- Main Content Section-->
<div class="wrapper">
<div id="main">

<form name="create-class" method="POST">

<div>
	<label for="ClassID">Class Item Number</label>
	<input type="number" name="ClassID" id="ClassID" placeholder="Item Number" required>
</div>

<div>
	<label for="ClassNO">Class Number</label>
	<input type="text" name="ClassNO" id="ClassNO" placeholder="ITEC Number" required>
</div>

<div>
	<label for="ClassName">Class Name</label>
	<input type="text" name="ClassName" id="ClassName" placeholder="Class Name" required>
</div>

<div>
	<label for="ExpDate">Class Expires</label>
	<input type="date" name="ExpDate" id="ExpDate" placeholder="Expiration Date" required>
</div>

<?php
// -- It's not pretty but it works.
// -- Dropdown needs to be put into function. KM 9/3/17

$sql = "SELECT SemesterID, SemesterName, Year From semester";
$semSelect = mysqli_query($con, $sql);
echo '<select name="SemesterID" required>'; // Open
// Loop to echo options
while($row = mysqli_fetch_array($semSelect)){
	echo '<option value="'.$row['SemesterID'].'">'.$row['SemesterName']." ".$row['Year'].'</option>';
}echo '</select>';// Close
?>

<div class="one">
<input type="submit" value="Add Class" name="AddClass" id="AddClass">
</div>
</div>

<?php 
if(isset($_POST['AddClass'])){
$newClass = new Classes(array(
	"LoginID" => $_SESSION["LoginID"],
	"ClassID" => $_POST["ClassID"],
	"ClassNO" => $_POST["ClassNO"],
	"ClassName" => $_POST["ClassName"],
	"SemesterID" => $_POST["SemesterID"],
	"ExpDate" => $_POST["ExpDate"]
));
$newClass->createClass();

if($newClass){
	header("Location: ../_facultyPages/all_classes.php");
}}
?>
</form>
</main>
</div>
<?php include("../_templates/footer.php");?>
</body>
</html>