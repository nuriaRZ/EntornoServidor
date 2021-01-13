<?php
$estadios["barcelona"]= "camp nou";
$estadios["real madrid"]= "santiago bernabeu";
$estadios["valencia"]= "mestalla";
$estadios["real sociedad"]= "anoeta";

echo "<table border=1px>";
    
foreach ($estadios as $indice => $value) {
    echo "<tr>";
    echo "<td>".$indice."</td>";
     echo "<td>".$value."</td>";
     echo "</tr>";
}

echo "</table>";
$estadios["real madrid"]="";

echo "<ol>";
foreach ($estadios as $indice => $value) {    
    echo "<li>".$indice."==>".$value. "</li>";
}
echo "</ol>";
?>

