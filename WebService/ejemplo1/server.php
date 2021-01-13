<?php
require_once __DIR__ . '/vendor/autoload.php';
$server=new nusoap_server();
$namespace="http://localhost/WebService/Ejemplo1/server.php";
//Se especifica cual será el nombre del servicio web
$server->configureWSDL("Ejemplo 1 Servicios Web",$namespace);

$server->register('Suma',
array('a'=>"xsd:int",'b'=>"xsd:int"),array("return"=>"xsd:int"),FALSE,FALSE,FALSE,FALSE,"Suma");
$server->register('Saludar', array('nombre'=>"xsd:string"),
array("return"=>"xsd:string"),FALSE,FALSE,FALSE,FALSE,"Saludar");
$server->register('ObtenerDatos',array('dni'=>"xsd:string"),array("return"=>"xsd:Array"),FALSE,FALSE,
FALSE,"Devuelve array");

function Saludar($nombre){
 return "Hola ".$nombre;
}
function Suma($a,$b){
 $suma=$a+$b;
 return $suma;
}
function ObtenerDatos($dni){
 $arr= array('Antonio',"de la Rosa","41");
 return ($arr);
}

$server->service(file_get_contents("php://input"));