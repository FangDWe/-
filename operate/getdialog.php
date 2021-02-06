<?php
$dbhost = 'localhost';

//to do
//$dbuser = ; 
//$dbpass = ;

$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ){
    die('连接失败: ' . mysqli_error($conn));
}

mysqli_select_db( $conn, 'blog');
$result = mysqli_query( $conn, 'select * from dialog');
if(! $result )
{
    die('无法读取数据: ' . mysqli_error($conn));
}


$jarr = array();
while ($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    array_push($jarr,$rows);
}

$res = json_encode($jarr);
header('Content-Type:application/json');
echo "$res";
mysqli_close($conn);
?>