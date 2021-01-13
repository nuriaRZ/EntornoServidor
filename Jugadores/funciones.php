<?php

function conexion(){
    $conex = new mysqli('localhost','dwes','abc123.','futbol');
    return $conex;
    
}

