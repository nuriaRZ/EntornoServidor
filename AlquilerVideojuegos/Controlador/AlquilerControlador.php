<?php
require_once 'Modelo/Conexion.php';
require_once 'Modelo/Alquiler.php';

class AlquilerControlador {
    public static function nuevoAlquiler(Alquiler $a) {
        try {
            $conex = new Conexion();
            $conex->exec("INSERT INTO alquiler  VALUES ('$a->id','$a->cod_juego','$a->dni_cliente', '$a->fecha_alquiler', '$a->fecha_devol')");
            // si queremos que devuelva algo return;
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    public static function recuperarAlquilados(){
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM alquiler, cliente, juegos WHERE Cod_juego=Codigo AND DNI_cliente=DNI AND Fecha_devol='null'");
           if($result->rowCount()){
               $a = new Alquiler();
               
               while ($row=$result->fetchObject()){
                   $a->nuevoAlquiler($row->id, $row->Cod_juego, $row->DNI_cliente, $row->Fecha_alquiler, $row->Fecha_devol);
                   $alquileres[] = clone($a);
                   $a = new Alquiler($row->id, $row->Cod_juego, $row->DNI_cliente, $row->Fecha_alquiler, $row->Fecha_devol); 
               }
               return $alquileres;               
           }
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }
    
    public static function recuperarAlquiladosCliente($dni){
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * FROM alquiler, cliente, juegos WHERE Cod_juego=Codigo AND DNI_cliente=DNI AND DNI_cliente='$dni' AND Fecha_devol='null'");
           if($result->rowCount()){
               $a = new Alquiler();
               
               while ($row=$result->fetchObject()){
                   $a->nuevoAlquiler($row->id, $row->Cod_juego, $row->DNI_cliente, $row->Fecha_alquiler, $row->Fecha_devol);
                   $alquileres[] = clone($a);
                   $a = new Alquiler($row->id, $row->Cod_juego, $row->DNI_cliente, $row->Fecha_alquiler, $row->Fecha_devol); 
               }
               return $alquileres;               
           }
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos');
            //mata el programa
        }
        unset($conex);
    }

    
    public static function devolverAlquiler($fecha, $codigo) {
        try {
            $conex = new Conexion();
            $conex->exec("UPDATE alquiler SET Fecha_devol = '$fecha' WHERE Cod_juego='$codigo'");
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($conex);
    }
      
      public static function calcularDiasAlquilados($id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT * from alquiler WHERE id='$id'");
            
            while($row = $result->fetchObject()){
                $fechaAlquiler = date_create($row->Fecha_alquiler);
                $fechaDevol = date_create($row->Fecha_devol);
                $dias = date_diff($fechaAlquiler, $fechaDevol);
                $dias = $dias->format('%a');
            }
           
            return $dias;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
      
      public static function pagoCliente($cod, $id) {
        try {
            $conex = new Conexion();
            $result = $conex->query("SELECT Precio from alquiler, juegos WHERE Cod_juego ='$cod' AND Codigo=Cod_juego AND id='$id'");   
            while($row = $result->fetchObject()){
                $precio = $row->Precio;
            }
            return $precio;
            
        } catch (PDOException $ex) {
            echo '<a href=index.php>Ir a inicio</a>';
            die('error con la base de datos' . $ex->getMessage());
        }
        unset($result);
        unset($conex);
      }
    
    
}
