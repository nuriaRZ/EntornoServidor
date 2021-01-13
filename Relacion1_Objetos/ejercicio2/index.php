<?php

include_once 'Vehiculo.php';
include_once 'Coche.php';
include_once 'Bicicleta.php';

$bici = new Bicicleta("KTM", "axt", "montaña", "amarilla");
echo $bici."<br>";
echo $bici->andar(25)."<br>";
echo $bici->caballito()."<br>";
echo $bici->andar(30)."<br>";
echo "Kilometros en bici: ".$bici->km."<br>";
$coche = new Coche("opel", "corsa", "azul", "5424R");
echo $coche."<br>";
echo $coche->andar(40)."<br>";
echo $coche->andar(10)."<br>";
echo $coche->quemarRueda()."<br>";
echo "Kilometros en coche: ".$coche->km."<br>";
echo "Kilometros Totales: ".Vehiculo::getKmTotal();
echo "Numero de vehiculos: ".Vehiculo::getVehiculosCreados();


