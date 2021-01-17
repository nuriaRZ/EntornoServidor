<?php
require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro servicio web.
$wsdl="http://localhost/tema6/ejercicio3/ej04_server.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP con el $wsdl especificado anteriormente.
$client=new nusoap_client($wsdl);
?>
<html>
    <form action="" method="post">
        Cantidad de cartas:        
        <input type="text" name="cantidad">
        <input type="submit" name="enviar" value="Enviar"> 
    </form>
</html>

<?php
if(isset($_POST['enviar'])){
    $mano = $client->call('obtenerCartas',array('cantidad'=>$_POST['cantidad']));
    print_r($mano);
    
    
}

