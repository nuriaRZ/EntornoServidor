<?php
require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro servicio web.
$wsdl="http://localhost/tarea6/tarea/server.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP con el $wsdl especificado anteriormente.
$client=new nusoap_client($wsdl);
//Realizamos la llamada al servicio web con Call
//Donde el primer parametro es la accion que llamara, y el segundo los parametros esperados por el web service
echo "PVP: ".$client->call('getPVP',array('codP'=>"3DSNG"))."<br>";
echo "Unidades ".$client->call('getStock',array('codP'=>"3DSNG", 'codT'=>"1"))."<br>";

$familias=$client->call('getFamilias', array());
echo 'Familias: ';
print_r($familias);

$productosDeFamilia=$client->call('getProductosFamilia', array('codF'=>"MP3"));
echo '<br>Productos de la misma familia: ';
print_r($productosDeFamilia);



