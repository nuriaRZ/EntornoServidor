<?php

$estudios = $_POST['estudios'];
print "Nombre: ".$_POST['nombre']."<br>";
print "Apellidos: ".$_POST['apellidos']."<br>";
print "Sexo: ".$_POST['sexo']."<br>";
print "Estado Civil: ".$_POST['estado']."<br>";
$arrAfi = json_decode($_POST['aficiones']);
$arrEst = json_decode($_POST['estudios']);
print "Aficiones: ";
foreach($arrAfi as $valor)
    echo $valor." ";
print "<br>Estudios ";
foreach($arrEst as $valor){
   echo $valor." ";
}
print "<br>Edad: ".$_POST['edad']."<br>";

