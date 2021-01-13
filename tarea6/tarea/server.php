<?php
require_once './Conexion.php';
require_once __DIR__ . '/vendor/autoload.php';
$server=new nusoap_server();
$namespace="http://localhost/tarea6/tarea/server.php";
//Se especifica cual será el nombre del servicio web
$server->configureWSDL("Tarea 6",$namespace);

$server->register('getPVP',
array('codP'=>"xsd:string"),array("return"=>"xsd:string"),FALSE,FALSE,FALSE,FALSE,"Precio del producto");

$server->register('getStock',
array('codP'=>"xsd:string", 'codT'=>"xsd:string"),array("return"=>"xsd:string"),FALSE,FALSE,FALSE,FALSE,"Stock existente de producto en tienda");

$server->register('getFamilias', array(), array("return"=>"xsd:Array"),FALSE,FALSE,FALSE,FALSE,"Devuelve array de codigos de familias");

$server->register('getProductosFamilia', array('codF'=>"xsd:string"), array("return"=>"xsd:Array"),FALSE,FALSE,FALSE,FALSE,"Devuelve array de codigos productos de la misma familias");



function getPVP($codP){
    try{
        $conex = new Conexion();
        $result = $conex->query("select PVP from producto where cod='$codP'");
        if($result->rowCount()){
            $registro = $result->fetchObject();
                return $registro->PVP;
            } 
    } catch (Exception $ex) {
        $errores[] = $exc->getMessage();
            die('error con la base de datos');
    }
    unset($conex);
    unset($result);
}

function getStock($codP, $codT){
    try{
        $conex = new Conexion();
        $result = $conex->query("select unidades from stock where producto='$codP' and tienda='$codT'");
        if($result->rowCount()){
            $registro = $result->fetchObject();
                return $registro->unidades;
            }  
        
    } catch (Exception $ex) {
        $errores[] = $exc->getMessage();
            die('error con la base de datos');
    }
    unset($conex);
    unset($result);
}

function getFamilias(){
    try{
        $conex = new Conexion();
        $result = $conex->query("select cod from familia");
        $array=[];
        if($result->rowCount()){            
           while ($registro = $result->fetchObject()) {
               foreach ($registro as $r){
                   array_push($array, $r);
               }
            } 
           return $array; 
        }    
        
    } catch (Exception $ex) {
        $errores[] = $exc->getMessage();
            die('error con la base de datos');
    }    
    unset($conex);
    unset($result);
}

function getProductosFamilia($codF){
    try{
        $conex = new Conexion();
        $result = $conex->query("select cod from producto where familia='$codF'");
        $array=[];
        if($result->rowCount()){            
           while ($registro = $result->fetchObject()) {
               foreach ($registro as $r){
                   array_push($array, $r);
               }
            } 
           return $array; 
        }
        
        
    } catch (Exception $ex) {
        $errores[] = $exc->getMessage();
            die('error con la base de datos');
    }
    unset($conex);
    unset($result);
}


$server->service(file_get_contents("php://input"));

