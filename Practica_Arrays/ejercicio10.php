<?php
$array = array(0=>3,1=>2,2=>8,3=>123,4=>5,5=>1);

sort($array);

print_r($array);

echo "<table border=1px>";
    
foreach ($array as $indice => $value) {
    echo "<tr>";
    echo "<td>".$indice."</td>";
     echo "<td>".$value."</td>";
     echo "</tr>";
}

echo "</table>";
?>

