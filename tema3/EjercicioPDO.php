<?php
 
//$opciones = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
try{
 $dwes=new PDO('mysql:host=localhost;dbname=jugadores','dwes','abc123.');  
//  $registro = $dwes->exec("update jugador set numGoles=10 where dni='50641502x'");
//  $error = $dwes->errorInfo();
//  echo $error[2];
// $result=$dwes->query("select * from jugador");
// $result->errorInfo();
// while($obj=$result->fetchObject()){
//     echo 'Nombre: '.$obj->nombre.'<br>';
// }
 $result=$dwes->prepare("select * from jugador where dorsal = ?");
 $dorsal=4;
 $result->bindParam(1, $dorsal);
 $result->execute();
 print_r($result->errorInfo());
 while($obj=$result->fetchObject()){
     echo 'Nombre: '.$obj->nombre.'<br>';
 }
 
} catch (PDOException $ex) {
    echo "Error: ".$ex->getMessage();
}


