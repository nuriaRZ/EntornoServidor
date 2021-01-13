<?php

session_start();
echo session_id()."<br>";
echo session_name()."<br>";
$_SESSION['nombre']='nuria';
echo $_SESSION['nombre']."<br>";
//setcookie("PHPSESSID", session_id(), time()+3600);


?>
<a href="ejemp_sesiones2.php">Ir</a>
