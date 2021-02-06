<?php

function list_tables($dbname,$con)
{
    mysqli_select_db($con, $dbname) or die("选择数据库失败!");
    $res = mysqli_query($con,"SHOW TABLES;");

    $tables = array();
    while($row = mysqli_fetch_array($res))
    {
        $tables[] = $row[0];
    }
    mysqli_free_result($res);
    return $tables;
}


$dbhost = 'localhost';
//to do
//$dbuser = ; 
//$dbpass = ;
//to do

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("连接服务器失败"); 
$set = mysqli_query($conn,'SHOW DATABASES;');
$dbs = array();
while($db = mysqli_fetch_row($set))
    $dbs[] = $db[0];

$dbt = array();
foreach($dbs as $key=>$value){
    $dbt[] = list_tables($value,$conn);
}

$jarr = array_merge($dbs, $dbt);
$res = json_encode($jarr);
header('Content-Type:application/json');
echo "$res";
mysqli_close($conn); 

?>