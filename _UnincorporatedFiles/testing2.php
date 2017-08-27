<?php
include ("config.php");
?>
pretty HTML <br>
<?php
$table = 'response';

$result = mysql_query("SELECT * FROM {$table}");
if (!$result) {
    die("Query to show fields from table failed");
} 

$fields_num = mysql_num_fields($result);

echo "<table border='1'><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
     foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
mysql_free_result($result);

?>
<br>
Export to CSV
<form action="export.php" method="get">
  <input type="submit" value="Export to CSV">
</form>