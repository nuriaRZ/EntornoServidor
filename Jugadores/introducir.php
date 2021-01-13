<form action="" method="post">
    Nombre: <input type="text" name="nombre" value=""><br>
    DNI: <input type="text" name="dni" value=""><br>
    Dorsal: <select name="dorsal" value="">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>        
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
    </select><br>
    Posición: <select multiple="" name="pos[]" value="">
        <option value="1">Portero</option>
        <option value="2">Defensa</option>
        <option value="4">Centrocampista</option>
        <option value="8">Delantero</option>
    </select><br>
    Equipo: <input type="text" name="equipo" value=""><br>
    Número de Goles: <input type="text" name="goles" value=""><br>
    <input type="submit" name="introducir" value="Introducir"><br>
    <a href="index.php">Volver</a><br>
</form>

<?php
require_once './funciones.php';
$conex = conexion();
if(isset($_POST['introducir'])){
    if(preg_match('/^[a-z]{1,50}$/i', $_POST['nombre'])&& preg_match('/^\d{8}[a-z]{1}$/i', $_POST['dni'])&& preg_match('/^\d{1,4}$/i', $_POST['goles'])){
    $posicion = 0;
   
    if(!$conex->errno){
        foreach($_POST['pos'] as $value){
            $posicion+=$value;            
        }
         $conex->query("insert into jugadores (Nombre, DNI, Dorsal, Posicion, Equipo, Goles) values ('$_POST[nombre]', '$_POST[dni]','$_POST[dorsal]', $posicion, '$_POST[equipo]', '$_POST[goles]')");
        echo $conex->error;
    }    
        
   }else{
       if(!preg_match('/^[a-z]{1,50}$/i', $_POST['nombre'])){
           echo 'Nombre no valido<br>'; 
          
       }
       if(!preg_match('/^\d{8}[a-z]{1}$/i', $_POST['dni'])){
           echo 'Dni no valido<br>';
          
       }
       if(!preg_match('/^\d{1,4}$/i', $_POST['goles'])){
           echo 'Numero de goles no valido<br>';
           
       }
   } 
    
}





