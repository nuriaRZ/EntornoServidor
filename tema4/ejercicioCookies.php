<?php
$fechaActual = date('d-m-y h:i:s');
setcookie("cookie", $fechaActual, time()+3600);
if(isset($_COOKIE['cookie'])){
echo 'Bienvenido a la web<br>';
echo 'Su ultimo acceso fue '.$_COOKIE['cookie'];
}else    echo 'Primer acceso';

