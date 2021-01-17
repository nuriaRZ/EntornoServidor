<?php
require_once __DIR__ . '/vendor/autoload.php';
$server=new nusoap_server();
$namespace="http://localhost/tema6/ejercicio3/ej04_server.php";
$server->configureWSDL("Ejercicio 4",$namespace);

$server->register('obtenerCartas',
array('cantidad'=>"xsd:int"),array("return"=>"xsd:Array"),FALSE,FALSE,FALSE,FALSE,"Devolver cartas");

function obtenerCartas($cantidad){
    $num = array(1,2,3,4,5,6,7,'Sota','Caballo', 'Rey');
    $palo = array('Oros', 'Espadas', 'Copas', 'Bastos');
    for ($i=1; $i <= $cantidad; $i++){
        $numAleatorio[] = $num[array_rand($num)];
        $paloAzar[] = $palo[array_rand($palo)];
        $carta = array_merge($numAleatorio, $paloAzar);        
        
    }
    return $carta;
    
    
}
$server->service(file_get_contents("php://input"));
