<?php
$num = 1;
$contador=0;
$array = array();

while ($contador <10){
  if($num % 2 == 0){
     $array = $num;
     $contador++;
     echo $array."<br>";
  }  
  $num++;
}



?>

