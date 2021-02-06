<?php
session_start();
if (isset($_SESSION['username']))
{
    $_SESSION['username'] = 'DISABLE';
    unset($_SESSION['username']);
    $_SESSION = [];
    session_destroy();
    if(isset($_COOKIE[session_name()])){
        setCookie(session_name(),'',time()-1);
    }
    echo("TRUE");
}
else{
    echo("FAIL");
}
?>