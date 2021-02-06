<?php
session_start();
if (isset($_SESSION['username']))
{
    if($_SESSION['username'] == "ALLOW"){
        echo("TRUE");
    }
    else{
        echo("FAIL");
    }
}
else {
    echo("FALSE");
}
?>