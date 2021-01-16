<?php
require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro servicio web.
$wsdl="http://localhost/tema6/ejercicio3/server.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP con el $wsdl especificado anteriormente.
$client=new nusoap_client($wsdl);
//Realizamos la llamada al servicio web con Call
//Donde el primer parametro es la accion que llamara, y el segundo los parametros esperados por el web service

?>
<html>
    <form action="" method="post">
        Convertir:
        <select name="moneda">
            <option value="euros">Euros</option> 
            <option value="dolares">Dolares</option>
        </select>
        Cantidad:<input type="text" name="cantidad">
        <input type="submit" name="convertir" value="Convertir"> 
    </form>
</html>

<?php
if(isset($_POST['convertir'])){
    if($_POST['moneda']=='euros'){
        echo "Resultado: ".$_POST['cantidad']."€"." son ".$client->call('Convertir',array('moneda'=>$_POST['moneda'], 'cantidad'=>$_POST['cantidad']))." dolares";
    }
    if($_POST['moneda']=='dolares'){
        echo "Resultado: ".$_POST['cantidad']." dolares "." son ".$client->call('Convertir',array('moneda'=>$_POST['moneda'], 'cantidad'=>$_POST['cantidad']))."€";
    }
    
}

