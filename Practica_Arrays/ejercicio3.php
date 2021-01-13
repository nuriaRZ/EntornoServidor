<?php
$meses ["enero"] = 9;
$meses ["febrero"] = 12; 
$meses ["marzo"] = 0; 
$meses ["abril"] = 17; 

foreach ($meses as $mes => $value){
    if($value!=0){
        echo 'En '.$mes.' se han visto '.$value." películas <br>"; 
    }
}

?>

