<?php

function crearMatriz($fil, $col) {
    $matriz = array();
    echo "<table border=1>";
    for ($i = 1; $i <= $fil; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $col; $j++) {
            $matriz[$i][$j] = rand(1, 50);
            echo "<td>" . $matriz[$i][$j] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    return $matriz;
}


function sumarFilas($matriz, $filas, $columnas){
    for($i=1; $i<=$filas; $i++ ){
        $suma = 0;
        for($j=1; $j<=$columnas; $j++ ){
            $suma += $matriz[$i][$j];
        }
        $array[] = $suma;
        echo "La fila ".$i." suma: ".$suma."<br>"; 
        
    }
    return $array;
}

function sumarCol($matriz, $filas, $columnas){
    for($i=1; $i<=$filas; $i++ ){
            $suma = 0;
            for($j=1; $j<=$columnas; $j++ ){
                $suma += $matriz[$j][$i];
            }
            $array[] = $suma;
            echo "La fila ".$i." suma: ".$suma."<br>"; 

        }
        return $array;
    
}

function sumaFilasYcolumnas($matriz, $filas, $columnas){
    $suma = 0;
   for($i=1; $i<=$filas; $i++ ){
            
            for($j=1; $j<=$columnas; $j++ ){
                $suma += $matriz[$i][$j];
            }
        }
        echo "Suma total de la matriz: ".$suma."<br>";
}

function diagonal($matriz, $filas, $columnas){
    $suma = 0;
    for($i=1; $i<$filas; $i++ ){
        for($j=1; $j<$columnas; $j++ ){
            if($i==$j) $suma += $matriz[$i][$j];
        }       

    }
    echo 'Suma de la diagonal: '.$suma.'<br>';

}


?>


