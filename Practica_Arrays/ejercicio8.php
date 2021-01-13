<?php



        
for ($i=0; $i<10; $i++ ){
    $numeros[$i] = $i;
}

print_r($numeros);
$suma=0;
$contador = 0;
foreach ($numeros as $indice => $value) {
    if($indice % 2==0){
        $suma += $value;
        $contador++;
    }
    else{
        echo "<br>Impar: ".$value;
    }
}

echo "<br>Media: ".$media = $suma / $contador;





?>

