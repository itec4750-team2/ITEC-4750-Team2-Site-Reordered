<?php 
include ("config.php");

?>
YEZZIR


EXPORT TO CSV 
<form action="export individual.php" method="get">
  <input type="submit" value="Export to CSV">
 <?php

$StudentID = mysql_real_escape_string($_POST['selecting']);
$table = 'response';

$query = mysql_query ("SELECT * FROM {$table} WHERE StudentID = '$StudentID'");
if (!$query) {
    die("Query to show fields from table failed");
} 

$fields_num = mysql_num_fields($query);

echo "<table border='1'><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($query);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysql_fetch_row($query))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
     foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
mysql_free_result($query);


?>
  
</form>

