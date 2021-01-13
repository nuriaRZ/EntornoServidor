<form action="" method="post">
    DNI jugador: <input type="text" name="dni" value="">
    <input type="submit" name="buscar" value="Buscar">
</form>
<?php
require_once './funciones.php';
$conex = conexion();

if(isset($_POST['buscar'])&& preg_match('/^\d{8}[a-z]{1}$/i', $_POST['dni'])){ 
    if(!$conex->errno){
        $result=$conex->query("select * from jugadores where DNI = '$_POST[dni]'");
        echo $conex->error;
        if($result->num_rows){
           while ($fila = $result->fetch_object()) { 
        $posiciones = explode(",", $fila->Posicion);
            ?>
<form action="" method="post">
    DNI: <input type="text" name="dni" value="<?php echo $fila->DNI ?> " readonly><br>
    Nombre: <input type="text" name="nombre" value="<?php echo $fila->Nombre ?> "><br>
    Dorsal: <select name="dorsal" value="">        
        <?php
        for($i=1; $i<=11; $i++){            
        echo "<option value='$i'";
         if($fila->Dorsal==$i) echo 'selected';
         echo ">".$i."</option>";
        
        }
        ?>
    </select><br>
    Posición: <select multiple="" name="pos[]" value="<?php echo $fila->Posicion ?>">
        <option value="1" <?php if(in_array("Portero", $posiciones)) echo "selected";?>>Portero</option>
        <option value="2" <?php if(in_array("Defensa", $posiciones)) echo "selected";?>>Defensa</option>
        <option value="4" <?php if(in_array("Centrocampista", $posiciones)) echo "selected";?>>Centrocampista</option>
        <option value="8" <?php if(in_array("Delantero", $posiciones)) echo "selected";?>>Delantero</option>
    </select><br>
    Equipo: <input type="text" name="equipo" value="<?php echo $fila->Equipo ?> "><br>
    Número de goles: <input type="text" name="goles" value="<?php echo $fila->Goles ?> "><br>
    <input type="submit" name="guardar" value="guardar"><br>
    <a href="index.php">Volver</a>
</form>
<?php
           }
        }else        echo 'No hay datos en la BBDD';
        
            
        
    }else{
          echo "No se puede acceder a la base de datos";
          exit();          
    }
    
}

if(isset($_POST['guardar'])&&preg_match('/^[a-z]{1,50}$/i', $_POST['nombre'])&& preg_match('/^\d{1,4}$/i', $_POST['goles']) ){
    
    $posicion = 0;
    $result = $conex->stmt_init();
    
        foreach($_POST['pos'] as $value){
            $posicion+=$value;            
        }
         $result->prepare("UPDATE jugadores SET Nombre = ?, Dorsal = ?, Posicion = ?, Equipo = ?, Goles = ? where DNI = '$_POST[dni]'");
         $result->bind_param('sisss', $_POST['nombre'], $_POST['dorsal'], $posicion, $_POST['equipo'], $_POST['goles'] );
         $result->execute();
         $result->close();
        echo 'Jugador Modificado';
        
        
   }else{
       if(isset($_POST['guardar'])&&!preg_match('/^[a-z]{1,50}$/i', $_POST['nombre'])){
           echo 'Nombre no valido<br>'; 
           
       }
       if(isset($_POST['guardar'])&&!preg_match('/^\d{1,4}$/i', $_POST['goles'])){
           echo 'Numero de goles no valido<br>';
          
       }
   
}



