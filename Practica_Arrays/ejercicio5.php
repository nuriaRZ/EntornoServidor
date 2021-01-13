<?php
$personas[0]["nombre"]="Pedro Torres";
$personas[0]["direccion"]="C/ Mayor 33";
$personas[0]["telefono"]="123456789";
$personas[1]["nombre"]="Francisco";
$personas[1]["direccion"]="C/ Rute 33";
$personas[1]["telefono"]="333333333";
$personas[2]["nombre"]="Miguel";
$personas[2]["direccion"]="C/ El Perri 33";
$personas[2]["telefono"]="122222222";
$personas[3]["nombre"]="Ana";
$personas[3]["direccion"]="C/ Cuevas 33";
$personas[3]["telefono"]="88888888";
$personas[4]["nombre"]="Maria";
$personas[4]["direccion"]="C/ La ronda 33";
$personas[4]["telefono"]="99999999";


echo "<table border=1px>";
foreach ($personas as $indpersona => $persona){
    echo "<tr>";
    foreach ($persona as $dato => $value){
        echo "<td>".$value."</td>";
    }
    echo "</tr>";
}
echo "</table>";



?>

