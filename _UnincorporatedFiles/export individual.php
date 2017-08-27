<?php 
include ("config.php");

?>

<?php 
$SID = mysql_real_escape_string($_POST['']);

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=individual_data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Column 1', 'Column 2', 'Column 3', 'Column 4', 'Column 5', 'Column 6', 'Column 7', 'Column 8', 'Column 9', 'Column 10', 'Column 11', 'Column 12'));


// fetch the data
mysql_connect('localhost', 'root', '');
mysql_select_db('mga db');
$rows = mysql_query("SELECT * FROM response WHERE StudentID = '$SID'");

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);

?>