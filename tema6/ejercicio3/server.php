<?php
require_once __DIR__ . '/vendor/autoload.php';
$server=new nusoap_server();
$namespace="http://localhost/tema6/ejercicio3/server.php";
$server->configureWSDL("Ejercicio 3",$namespace);

$server->register('Convertir',
array('moneda'=>"xsd:string", 'cantidad'=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"Convertir monedas");

function Convertir($moneda, $cantidad){
    if($moneda=='euros'){
        $r = $cantidad * 1.21;
        return $r;
    }
    if($moneda=="dolares"){
        $r = $cantidad * 0.82;
        return $r;
    }
}
$server->service(file_get_contents("php://input"));
?>
