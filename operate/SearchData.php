<?php
$dbhost = 'localhost';
//to do
//$dbuser = ; 
//$dbpass = ;
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}

mysqli_select_db( $conn, 'First' );
$sql = 'SELECT * FROM example';
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}

echo('<table>');
while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{
    echo "<tr><td> {$row['example_id']}</td> ".
         "<td>{$row['example_name']} </td> ".
         "<td>{$row['establish_date']} </td> ".
         "</tr>";
}
echo '</table>';
mysqli_close($conn);
?>