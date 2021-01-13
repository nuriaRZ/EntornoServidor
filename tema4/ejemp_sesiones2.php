<?php
session_start();
echo $_SESSION['nombre']."<br>";
echo session_id()."<br>";
echo session_name()."<br>";
//session_unset();
//session_destroy();
setcookie("PHPSESSID",session_id(), time()+3600,"/");

