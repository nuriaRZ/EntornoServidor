<?php
require_once __DIR__ . '/vendor/autoload.php';
$server=new nusoap_server();
$namespace="http://localhost/WebService/Ejemplo1/server.php";
//Se especifica cual será el nombre del servicio web
$server->configureWSDL("Ejemplo 1 Servicios Web",$namespace);

$server->register('Suma',
array('a'=>"xsd:int",'b'=>"xsd:int"),array("return"=>"xsd:int"),FALSE,FALSE,FALSE,FALSE,"Suma");

function Suma($a,$b){
 $suma=$a+$b;
 return $suma;
}

$server->service(file_get_contents("php://input"));
