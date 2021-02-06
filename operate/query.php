<?php
session_start();
if (isset($_SESSION['username'])){
    if($_SESSION['username'] != "ALLOW"){
        exit('没有权限');
    }
}
else {
    exit('没有权限');
}

$dbhost = 'localhost';
//to do
//$dbuser = ; 
//$dbpass = ;
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn ){
    die('连接失败: ' . mysqli_error($conn));
}

mysqli_select_db( $conn, $_GET['db'] );
$result = mysqli_query( $conn, $_GET['query']);
if(! $result )
{
    die('无法读取数据: ' . mysqli_error($conn));
}

$domain = strstr($_GET['query'], 'select');
if($domain == ""){
    echo($result);
}
else{
    $jarr = array();
    while ($rows=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        array_push($jarr,$rows);
    }
    
    $res = json_encode($jarr);
    header('Content-Type:application/json');
    echo "$res";
}
mysqli_close($conn);
?>