<?php 
include("config.php");

$StudentID = mysql_real_escape_string($_POST['select']);
$quality = mysql_real_escape_string($_POST['quality']);
$quantity = mysql_real_escape_string($_POST['quantity']);
$creativity = mysql_real_escape_string($_POST['creativity']);
$turnTaking = mysql_real_escape_string($_POST['turnTaking']);
$effort = mysql_real_escape_string($_POST['effort']);
$attitude = mysql_real_escape_string($_POST['attitude']);
$attendance = mysql_real_escape_string($_POST['attendance']);
$preparation = mysql_real_escape_string($_POST['preparation']);
$willingness = mysql_real_escape_string($_POST['willingness']);
$completion = mysql_real_escape_string($_POST['completion']);

$sql = "INSERT INTO response (StudentID, quality, quantity, creativity, turnTaking, effort, attitude, attendance, preparation, willingness, completion) 
VALUES ('$StudentID', '$quality', '$quantity', '$creativity', '$turnTaking', '$effort', '$attitude', '$attendance', '$preparation', '$willingness',
'$completion')";  

if (!mysql_query($sql)) {
    die('Error: ' . mysql_error()); 
}

?>