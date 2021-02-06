<?php
session_start();

//to do
// if(isset($_GET['username']) && isset($_GET['password'])){
//     if($_GET['username'] ==  && $_GET['password'] == ){
//         $_SESSION['username'] = "ALLOW";
//     }
//     else{
//         $_SESSION['username'] = 'DISABLE';
//     }
// }

if (isset($_SESSION['username']))
{
    if($_SESSION['username'] == "ALLOW"){
        echo("TRUE");
    }
    else{
        echo("FALSE");    
    }
}
else {
    echo("FAIL");
}
?>