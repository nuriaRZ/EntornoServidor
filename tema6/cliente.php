<?php

$json= file_get_contents("http://localhost/tema6/servidor.php");
$datos = json_decode($json);
print_r($datos);
