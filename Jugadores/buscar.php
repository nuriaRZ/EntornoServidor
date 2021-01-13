<form action="" method="post">
    Buscar por:
    <select name="selector" value="">
        <option value="DNI">DNI</option>
        <option value="Equipo">Equipo</option>
        <option value="Posicion">Posición</option>        
    </select><br>
    Valor a buscar:<input type="text" name="valor" value="">
    <input type="submit" name="buscar" value="Buscar">    
</form>
    <?php
    require_once './funciones.php';
$conex = conexion();
if(isset($_POST['buscar'])){    
    
    if(!$conex->errno){
        $result=$conex->query("select * from jugadores where $_POST[selector] like '%$_POST[valor]%'");
        echo $conex->error;
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
}



