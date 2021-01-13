<?php

function valores($a=3, $b=4, $c=5){
    $aux=$a;    
    $a=$b;
    $b=$c;
    $c=$aux;
    return $a." ".$b." ".$c;
}

?>

