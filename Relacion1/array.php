<?php


      
    echo "<table border=1px>";
        
foreach ($_SERVER as $nombre => $valor) {
   echo "<tr>";
    echo "<td>".$nombre."</td>";
    echo "<td>".$valor."</td>";
  echo "</tr>";

}
  
echo "</table>";
?>

