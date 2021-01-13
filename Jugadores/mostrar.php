
<?php
require_once './funciones.php';
$conex = conexion();

$result = $conex->query("select * from jugadores");
if(!$conex->errno){
    if($result->num_rows){
        while ($fila = $result->fetch_object()) {
                    echo "<br><u>JUGADOR:</u><br>";
                    echo "Nombre: " .$fila->Nombre. "<br>";
                    echo "DNI: " .$fila->DNI."<br>";
                    echo "Dorsal: " .$fila->Dorsal."<br>";
                    echo "Posición: " .$fila->Posicion."<br>";
                    echo "Equipo: " .$fila->Equipo."<br>";
                    echo "Número de goles: " .$fila->Goles."<br>";
                }
    }else        echo 'No hay datos en la BBDD';
}else{
      echo "No se puede acceder a la base de datos";
       exit();
     }
?>
<a href="index.php">Volver</a>



