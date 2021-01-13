<?php

$matriz["fil1"]["col1"] = 1;
$matriz["fil1"]["col2"] = 2;
$matriz["fil1"]["col3"] = 3; 
$matriz["fil2"]["col1"] = 4;
$matriz["fil2"]["col2"] = 5;
$matriz["fil2"]["col3"] = 6;
$matriz["fil3"]["col1"] = 7;
$matriz["fil3"]["col2"] = 8;
$matriz["fil3"]["col3"] = 9;

 echo "<table border=1px>";
foreach ($matriz as $indfila=>$fila){
    echo "<tr>";
    foreach ($fila as $indcol => $value){
        echo"<td>".$value."</td>";
    }
    echo"</tr>";
}

echo "</table>";

print_r($matriz);



?>

