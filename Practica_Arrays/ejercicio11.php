<?php
for($i=0; $i<4;$i++){
    $array1[$i]= rand(1,100);
}
echo "ARRAY 1: <br>";
print_r($array1);
for($i=0; $i<4;$i++){
    $array2[$i]= rand(1,100);    
}
echo "<br>ARRAY 2:<br>";
print_r($array2);

$result = array_merge($array1, $array2);
echo "<br>UNIR ARRAYS CON MERGE:<br>";
print_r($result);

    $contador = 0;
    for ($i = 0; $i < 8; $i++ ){
        if($i<4){
            $array3[$i] = $array1[$i];
        }    
       if($i>=4){           
           $array3[$i] = $array2[$contador];
           $contador++;
       }
          
    }
    echo "<br>UNIR ARRAYS DE FORMA MANUAL:<br>";
    print_r($array3);
    
    sort($result);
    echo "<br>ORDENAR ARRAY CON SORT<br>";
    print_r($result);

    do{
        $esMayor=false;
        for($i=0; $i < count($array3)-1; $i++){
            if($array3[$i] > $array3[$i+1]){
                $aux = $array3[$i];
                $array3[$i]=$array3[$i+1];
                $array3[$i+1] = $aux;
                $esMayor = true;
            }
        }
        
    }while($esMayor == true);
        
    
    echo "<br>ORDENAR ARRAY DE FORMA MANUAL<br>";
    print_r($array3);
    
?>

